<table>
<thead>
<tr>
    <th>Nama Pemilik</th>
    <th>Nama Asosiasi</th>
</tr>
</thead>
<tbody>
@foreach($data as $key=>$item)
    <tr>
        <td>{{ $item->nama_pemilik }}</td>
        <td>{{ $item->asosiasi->asosiasi_kapal }}</td>
       
    </tr>
@endforeach
</tbody>