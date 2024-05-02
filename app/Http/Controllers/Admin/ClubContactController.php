<?php

namespace App\Http\Controllers\Admin;


use Auth;
use App\Models\ClubContact;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ClubContactController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {

        $hasPermission = Auth::user()->hasPermission('view_contacts');

        if ($hasPermission) {


            $searchKey = $request->searchKey;
            $club_contacts = ClubContact::getClubContactForFilters($searchKey);

            return view('admin.club_contacts.all_club_contacts', compact('club_contacts', 'searchKey'));
        } else {

            return redirect('admin/not_allowed');
        }
    }


    public function createClubContactUI()
    {

        $hasPermission = Auth::user()->hasPermission('add_contacts');

        if ($hasPermission) {

            return view('admin.club_contacts.components.new_club_contacts');
        } else {

            return redirect('admin/not_allowed');
        }
    }


    public function store(Request $request)
    {

        try {

            $hasPermission = Auth::user()->hasPermission('add_contacts');

            if ($hasPermission) {

                $validated = $request->validate(
                    [
                        'club_name' => 'required',
                        'competition_type' => 'required',
                        'number_of_teams' => 'required',
                        'contact_person' => 'required',
                        'contact_phone' => 'required',
                        'executive_name' => 'required',
                        'designation' => 'required',
                        'executive_phone' => 'required',                       
                        'status' => 'required',
                    ]
                );

                $club_contacts = new ClubContact;
                $club_contacts->club_name = $request->club_name;
                $club_contacts->competition_type = $request->competition_type;
                $club_contacts->number_of_teams = $request->number_of_teams;
                $club_contacts->contact_person = $request->contact_person;
                $club_contacts->contact_phone = $request->contact_phone;
                $club_contacts->executive_name = $request->executive_name;
                $club_contacts->designation = $request->designation;
                $club_contacts->executive_phone = $request->executive_phone;
                $club_contacts->status = $request->status;
                $club_contacts->email = $request->email;
            
                ClubContact::create($club_contacts->toArray());

                return redirect('admin/club-contacts')->with('success', "Club Contact created successfully !");
          
            } else {

                return redirect('admin/not_allowed');
            }
        } catch (\Exception $exception) {

            return back()->with('error', $exception->getMessage());
        }
    }



    public function deleteClubContact($id)
    {

        $hasPermission = Auth::user()->hasPermission('remove_contacts');

        if ($hasPermission) {

            try {


                $deleted = ClubContact::where('id', $id)->delete();

                if ($deleted) {
                    return back()->with('success', 'Club Contact deleted successfully !');
                } else {

                    return back()->with('error', 'Could not delete the Club Contact !');
                }
            } catch (\Exception $exception) {
                return back()->with('error', 'Error occured - ' . $exception->getMessage());
            }
        } else {

            return redirect('admin/not_allowed');
        }
    }

    public function updateClubContactUI($id)
    {

        $hasPermission = Auth::user()->hasPermission('edit_contacts');

        if ($hasPermission) {
        
            $club_contact = ClubContact::getUserClubContactForId($id);
            return view('admin.club_contacts.components.edit_club_contacts', compact('club_contact'));
        } else {

            return redirect('admin/not_allowed');
        }
    }

    public function updateClubContact(Request $request)
    {
        $hasPermission = Auth::user()->hasPermission('edit_contacts');

        if ($hasPermission) {
            $validated = $request->validate(
                [
                    'club_name' => 'required',
                    'competition_type' => 'required',
                    'number_of_teams' => 'required',
                    'contact_person' => 'required',
                    'contact_phone' => 'required',
                    'executive_name' => 'required',
                    'designation' => 'required',
                    'executive_phone' => 'required',                       
                    'status' => 'required',
                ]
            );

            $club_contacts = ClubContact::getUserClubContactForId($request->club_contact_id);

            if ($club_contacts != null) {

                $club_contacts->club_name = $request->club_name;
                $club_contacts->competition_type = $request->competition_type;
                $club_contacts->number_of_teams = $request->number_of_teams;
                $club_contacts->contact_person = $request->contact_person;
                $club_contacts->contact_phone = $request->contact_phone;
                $club_contacts->executive_name = $request->executive_name;
                $club_contacts->designation = $request->designation;
                $club_contacts->executive_phone = $request->executive_phone;
                $club_contacts->status = $request->status;
                $club_contacts->email = $request->email;

                $club_contacts->save();


                return redirect('admin/club-contacts')->with('success', 'Your Club Contact "' . $request->title . '" updated and submitted for the approval.');
            } else {
                return back()->with('error', 'Could not find the Club Contact.');
            }
        } else {

            return redirect('admin/not_allowed');
        }
    }

    public function exportClubContacts(){

        $contacts = ClubContact::all();

        $fileName = date('Y_m_d').'_club_contacts.csv';

        $headers = array(
            "Content-type"        => "text/csv",
            "Content-Disposition" => "attachment; filename=$fileName",
            "Pragma"              => "no-cache",
            "Cache-Control"       => "must-revalidate, post-check=0, pre-check=0",
            "Expires"             => "0"
        );

        $columns = array('ID', 'CLUB NAME', 'COMPETITION TYPE', 'NUMBER OF TEAMS','CONTACT PERSON','CONTACT NO','EMAIL','EXECUTIVE NAME','DESIGNATION','EXECUTIVE CONTACT NO','STATUS');

        $callback = function() use($contacts, $columns) {
            $file = fopen('php://output', 'w');
            fputcsv($file, $columns);

            foreach ($contacts as $contact) {                             
                                                        
                $row['ID']  = $contact->id;
                $row['CLUB NAME']  = $contact->club_name;
                $row['COMPETITION TYPE']    = $contact->competition_type;
                $row['NUMBER OF TEAMS']  = $contact->number_of_teams;
                $row['CONTACT PERSON']  = $contact->contact_person;
                $row['CONTACT NO']    = $contact->contact_phone;
                $row['EMAIL']  = $contact->email;
                $row['EXECUTIVE NAME']  = $contact->executive_name;  
                $row['DESIGNATION']  = $contact->designation; 
                $row['EXECUTIVE CONTACT NO']  = $contact->executive_phone; 
                $row['STATUS']  = $contact->status;

                fputcsv($file, array($row['ID'], $row['CLUB NAME'], $row['COMPETITION TYPE'], $row['NUMBER OF TEAMS'], $row['CONTACT PERSON'], $row['CONTACT NO'], $row['EMAIL'], $row['EXECUTIVE NAME'], $row['DESIGNATION'], $row['EXECUTIVE CONTACT NO'], $row['STATUS']));
            }

            fclose($file);
        };

        return response()->stream($callback, 200, $headers);

    }

    public function importClubContacts(Request $request){

    $hasPermission = Auth::user()->hasPermission('add_contacts');

    if($hasPermission){

        $validated = $request->validate(
            [
                'file' => 'required'
            ]
        );

        if($request->file != null){

            ini_set('max_execution_time', 1800);

            $path = $request->file('file')->getRealPath();
            $records = array_map('str_getcsv', file($path));


            // Get field names from header column
            $fields = array_map('strtolower', $records[0]);

            // Remove the header column
            array_shift($records);


            foreach ($records as $record) {
            //update prices

            $contact = ClubContact::where('id',$record[0])->get()->first();

                    if($record[0] == null){
                            //updating zone prices
                            $contact = new ClubContact();

                    }

                    $contact->club_name = $record[1];
                    $contact->competition_type = $record[2];
                    $contact->number_of_teams = $record[3];
                    $contact->contact_person = $record[4];
                    $contact->contact_phone = $record[5];
                    $contact->email = $record[6];
                    $contact->executive_name = $record[7];
                    $contact->designation = $record[8];
                    $contact->executive_phone = $record[9];
                    $contact->status = $record[10];

                    $contact->save();
            
            }

            return back()->with('success','Club contacts updated successfully !');

        }else{

            return back()->with('error','Please upload a contact csv sheet to continue.');

        }


    }else{

    return redirect('admin/not_allowed');

    }



    }
}
