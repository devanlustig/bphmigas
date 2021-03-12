

<table>
    <thead>
    <tr>
        <th> No </th>
        <th>Nama Pemilik</th>
        <th>Asosiasi Kapal</th>
       
    </tr>
    </thead>
    <tbody>
    <?php $no = 0; ?>
    @foreach($pemilik as $item)
    <?php $no++ ?>
        <tr>
            <td>{{ $no }}</td>
            <td>{{ $item->nama_pemilik }}</td>
            <td>{{ $item->asosiasi->asosiasi_kapal }}</td>
        </tr>
    @endforeach
    </tbody>
</table>
