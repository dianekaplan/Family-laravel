<?php namespace Acme\Mailers;

use App\User;
use App\Person;
use App\Family;
use App\Update;
use App\Http\Requests\SavePersonRequest;
use App\Http\Requests\SaveFamilyRequest;

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
            'first' => $request->first,
            'middle' => $request->middle,
            'last' => $request->last,
            'maiden' => $request->maiden,
            'nickname' => $request->nickname,
            'birthdate' => $request->birthdate,
            'birthplace' => $request->birthplace,
            'origin' => $request->origin,
            'education' => $request->education,
            'work' => $request->work,
            'interests' => $request->interests,
            'location' => $request->current_location
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
            'birthplace' => $request->birthplace,
            'origin' => $request->origin,
            'education' => $request->education,
            'work' => $request->work,
            'interests' => $request->interests,
            'location' => $request->current_location

        ];
        $subject= 'Thanks for the person update';

        return $this->sendTo($user, $subject, $view, $data);
    }

    public function family_update_notify(User $diane_user, SaveFamilyRequest $request, User $user_who_made_update, Family $family)
    {
        //in this one the email recipient user should always be me
        $view = 'emails.family_update_notify';
        $data = [
//            'summary'=> $update->update_summary,
            'updater'=> $user_who_made_update->name,
            'caption' => $family->caption,
            'mother_id' => $family->mother_id,
            'father_id' => $family->father_id,
            'marriage_date' => $family->marriage_date,
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
            'marriage_date' => $family->marriage_date,
            'notes1' => $family->notes1,
            'notes2' => $family->notes2,

        ];
        $subject= 'Thanks for the family update';

        return $this->sendTo($user, $subject, $view, $data);
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

}

