<table style='border: 1px solid black;'>
    <thead>
        <tr style='border: 1px solid black;'>
            <th style='border: 1px solid black;'>Product ID</th>
            <th style='border: 1px solid black;'>Image</th>
            <th style='border: 1px solid black;'>Description</th>
            <th style='border: 1px solid black;'>Price</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($product as $p)
        <tr>
            <td style='border: 1px solid black;'>{{ $p->id }}</td>
            <td style='border: 1px solid black;'> <img width='20' height='100' src="{{ $p->image->src }}"></td>
            <td style='border: 1px solid black;'>{{ $p->body_html }}</td>
            <td style='border: 1px solid black;'>{{ $p->id }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
