<style>
    .product-table {
        width: 100%;
        border-collapse: collapse;
    }

    .product-table th,
    .product-table td {
        padding: 8px;
        text-align: left;
        border-bottom: 1px solid #ddd;
    }

    .product-table thead th {
        background-color: #f2f2f2;
    }

    .product-table tbody tr:nth-child(even) {
        background-color: #f9f9f9;
    }
</style>
<table class="product-table">
    <thead>
        <tr>
            <th>Product ID</th>
            <th>Image</th>
            <th>Description</th>
            <th>Price</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($product as $p)
        <tr>
            <td>{{ $p->id }}</td>
            <td><img width="200" height="100" src="{{ $p->image->src }}"></td>
            <td>{{ $p->body_html }}</td>
            <td>{{ $p->id }}</td>
        </tr>
        @endforeach
    </tbody>
</table>