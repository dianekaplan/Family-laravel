<!-- resources/views/emails/password.blade.php -->
<!--got this from here along with auth views: https://github.com/bestmomo/scafold/blob/master/views/app.blade.php -->
Click here to reset your password for the family tree: <br/>
{{ url('password/reset/'.$token) }}
<br/><br/>
If you have any questions, reply back and let me know!<br/><br/>

Thanks,<br/>
Diane