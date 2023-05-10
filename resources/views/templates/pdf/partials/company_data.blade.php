<td style="width: 50%; vertical-align: top;">
    <table style="width: 100%;" class="bordered">
        <tr>
            <th>
                <h4><b>{{$label}}</b></h4>
            </th>
        </tr>
        <tr>
            <td style="padding:10px;">
                <h4>{{$invoice[$prefix.'_name']}}</h4>
                <h4>NIP: {{$invoice[$prefix.'seller_nip']}}</h4>
                <h4>{{$invoice[$prefix.'_address']}}</h4>
                <h4>{{$invoice[$prefix.'_postcode']}} {{$invoice[$prefix.'_city']}}</h4>
            </td>
        </tr>
    </table>
</td>
