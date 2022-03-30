<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;">
@if (trim($slot) === 'Billto')
<img src="https://billto.io/public/assets/frontend/img/LOGO/billto-logo.png" class="logo" alt="Billto">
@else
{{ $slot }}
@endif
</a>
</td>
</tr>
