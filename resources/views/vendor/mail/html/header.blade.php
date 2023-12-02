@props(['url'])
<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;">
@if (trim($slot) === 'Laravel')
<img src="https://i.ibb.co/khmrLb8/logomail.jpg" class="logo" alt="ibook Logo">
@else
{{ $slot }}
@endif
</a>
</td>
</tr>
