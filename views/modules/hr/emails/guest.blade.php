@component('mail::message')
<div>
    <p>Sayın {{ $application->present()->fullname }}</p>
    <p>Başvuru formunuz tarafımıza ulaşmıştır. En kısa zamanda incelenerek geri dönüş yapılacaktır. İlginize teşekkür ederiz.</p>
    <hr>
    {!! setting('theme::company-name') !!}<br>
    {!! setting('theme::address') !!}<br>
    {{ setting('theme::phone') }}<br>
    {{ setting('theme::email') }}
</div>
@endcomponent
