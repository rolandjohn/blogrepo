@component('mail::message')
# Introduction

Thank you so much for registering!

@component('mail::button', ['url' => 'http://roland.dev'])
Enjoy Browsing
@endcomponent


@component('mail::panel', ['url' => ''])
John 3:16
	For God so Love the world that He gave His only begotten Son, That whosever believeth on Him shall not perish but have everlasting life.
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
