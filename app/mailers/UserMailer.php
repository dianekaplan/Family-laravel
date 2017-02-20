<?php namespace Acme\Mailers;

use App\User;
use App\Person;
use App\Family;
use App\Update;
use App\Http\Requests\SavePersonRequest;
use App\Http\Requests\SaveFamilyRequest;
use App\Http\Requests\RegistrationRequest;
use Carbon\Carbon;



class UserMailer extends Mailer {

//public function welcome(User $user)
    public function welcome(User $user, Person $person)
{
    $view = 'emails.welcome';
    $data = [
        'name' => $user->name,
        'email' => $user->email,
        'password' => $user->password,
        'face'=> $person->face
    ];
    $subject= 'Welcome to the family tree!!';

    return $this->sendTo($user, $subject, $view, $data);
}

    public function forgot_password(User $user)
    {
        $view = 'emails.password';
        $data = [];
        $subject= 'Forgot Password';

        return $this->sendTo($user, $subject, $view, $data);
    }




    public function person_update_notify(User $diane_user, SavePersonRequest $request, User $user_who_made_update, Person $updated_person)
    {
        //in this one the email recipient user should always be me
        $view = 'emails.person_update_notify';
        $data = [
//            'summary'=> $update->update_summary,
            'updater'=> $user_who_made_update->name,
            'updated_person_first' => $updated_person->first,
            'updated_person_last' => $updated_person->last,
            'id' => $updated_person->id,
            'first' => $request->first,
            'middle' => $request->middle,
            'last' => $request->last,
            'maiden' => $request->maiden,
            'nickname' => $request->nickname,
            'birthdate' => $request->birthdate,
            'birthdate_note' => $request->birthdate_note,
            'birthplace' => $request->birthplace,
            'origin' => $request->origin,
            'education' => $request->education,
            'work' => $request->work,
            'interests' => $request->interests,
            'location' => $request->current_location,
            'notes1' => $request->notes1,
            'notes2' => $request->notes2,
            'notes3' => $request->notes3

        ];
        $subject= 'A person has been updated';

        return $this->sendTo($diane_user, $subject, $view, $data);
    }

    public function person_update_thankyou(User $user, SavePersonRequest $request,  Person $updated_person)
    {
        $view = 'emails.person_update_thankyou';
        $data = [
            'name' => $user->name,
            'updated_person_first' => $updated_person->first,
            'updated_person_last' => $updated_person->last,
            'first' => $request->first,
            'middle' => $request->middle,
            'last' => $request->last,
            'maiden' => $request->maiden,
            'nickname' => $request->nickname,
            'birthdate' => $request->birthdate,
            'birthdate_note' => $request->birthdate_note,
            'birthplace' => $request->birthplace,
            'origin' => $request->origin,
            'education' => $request->education,
            'work' => $request->work,
            'interests' => $request->interests,
            'location' => $request->current_location,
            'notes1' => $request->notes1,
            'notes2' => $request->notes2,
            'notes3' => $request->notes3

        ];
        $subject= 'Thanks for the person update';

        return $this->sendTo($user, $subject, $view, $data);
    }

    public function family_update_notify(User $diane_user, SaveFamilyRequest $request, User $user_who_made_update, Family $family)
    {
        //in this one the email recipient user should always be me
        $view = 'emails.family_update_notify';

        //Had an issue with marriage_date: when I saved it like the others I got an expected string, array given error, because carbon date has date, timezone_type, timezone
        //However when I tried accessing the array element I got an error that I can't treat a Carbon object like an array,
        // and when I tried Carbon::parse it said I can't use that on an array
        //

        $data = [
//            'summary'=> $update->update_summary,
            'updater'=> $user_who_made_update->name,
            'id' => $family->id,
            'caption' => $family->caption,
            'mother_id' => $family->mother_id,
            'father_id' => $family->father_id,
//            'marriage_date' => $family->marriage_date,
            'notes1' => $family->notes1,
            'notes2' => $family->notes2,
        ];
        $subject= 'A family has been updated';

        return $this->sendTo($diane_user, $subject, $view, $data);
    }

    public function family_update_thankyou(User $user, SaveFamilyRequest $request,  Family $family)
    {
        $view = 'emails.family_update_thankyou';
        $data = [
            'updater'=> $user->name,
            'caption' => $family->caption,
            'mother_id' => $family->mother_id,
            'father_id' => $family->father_id,
//            'marriage_date' => $family->marriage_date,
            'notes1' => $family->notes1,
            'notes2' => $family->notes2,

        ];
        $subject= 'Thanks for the family update';

        return $this->sendTo($user, $subject, $view, $data);
    }

    public function note_notify(User $user, User $user_who_added_note, $entity_with_new_note, $body, $redirect_url)
    {
        //in this one the email recipient user should always be me
        $view = 'emails.note_notify';
        $data = [
            'updater'=> $user_who_added_note->name,
            'body'=> $body,
            'entity_with_new_note'=> $entity_with_new_note,
            'redirect_url'=> $redirect_url,
        ];
        $subject= 'A note has been added';

        return $this->sendTo($user, $subject, $view, $data);
    }

    public function note_thankyou(User $user_who_added_note, $entity_with_new_note, $body, $redirect_url)
    {
        $view = 'emails.note_thankyou';
        $data = [
            'updater'=> $user_who_added_note->name,
            'body'=> $body,
            'entity_with_new_note'=> $entity_with_new_note,
            'redirect_url'=> $redirect_url,
        ];
        $subject= 'Thanks for adding your note';

        return $this->sendTo($user_who_added_note, $subject, $view, $data);
    }


    public function update_notify(User $user, Update $update, User $user_who_made_update)
    {
        //in this one the email recipient user should always be me
        $view = 'emails.update_notify';
        $data = [
            'summary'=> $update->update_summary,
            'updater'=> $user_who_made_update->name
        ];
        $subject= 'An update has been made';

        return $this->sendTo($user, $subject, $view, $data);
    }

    public function update_thankyou(User $user, Update $update)
    {
        $view = 'emails.update_thankyou';
        $data = [
            'name' => $user->name,
            'summary'=> $update->update_summary
        ];
        $subject= 'Thanks for the update';

        return $this->sendTo($user, $subject, $view, $data);
    }

    public function registration_request_notify (User $user,  $request)
    {
        //in this one the email recipient user should always be me
        $view = 'emails.registration_request_notify';
        $data = [
                'name'=> $request['name'],
                'email'=> $request['email'],
                'related'=> $request['related'],
        ];
        $subject= 'There is a new account request!';

        return $this->sendTo($user, $subject, $view, $data);
    }

    public function general_notify (User $user, $request)
    {
        //in this one the email recipient user will always be me
        $subject= 'An email has been sent!';
        $view = 'emails.general_notify';
        $data = [
            'recipient_list'=> $request['recipient_list'],
            'subject'=> $request['subject'],
            'body'=> $request['body'],
        ];

        return $this->sendTo($user, $subject, $view, $data);
    }

    // here's where we send using the emails and subject from the form
    public function general_send ( $request)
    {
        $view = 'emails.general_send';

        // make comma-separated list into an array
        $recipient_list = explode(",", $request['recipient_list']);

        $subject = $request['subject'];
        $data = [
            'body'=> $request['body'],
        ];

        return $this->sendToMany($subject, $recipient_list, $view, $data);
    }
}

