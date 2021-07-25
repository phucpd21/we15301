@extends('layout')
@section('title')
    Edit user page
@endsection

@section('contents')
    <div class="row col-8 mx-auto">
        <div class="row">
            <div class="col-8">abc</div>
            <div class="col-4">123</div>
        </div>
        <div class="row">
            <table class="table-striped table">
                <thead>
                        <td>Id</td>
                        <td>Name</td>
                        <td>Phone Number</td>
                        <td>Address</td>
                        <td>Total price</td>
                        <td>Invoice Status</td>
                        <td>Created</td>
                </thead>
                <tbody>
                    @foreach ($user->invoices as $invoice)
                        <tr>
                            <td>{{ $invoice->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $invoice->phone_number }}</td>
                            <td>{{ $invoice->address }}</td>
                            <td>{{ $invoice->total_price }}</td>
                            <td>
                                @if ($invoice->status == config('common.invoice.status.cho_duyet'))
                                    {{ 'Chờ duyệt' }}
                                @elseif($invoice->status == config('common.invoice.status.dang_xu_ly'))
                                    {{ 'Đang xử lý' }}
                                @elseif($invoice->status == config('common.invoice.status.dang_giao_hang'))
                                    {{ 'Đang giao hàng' }}
                                @elseif($invoice->status == config('common.invoice.status.da_giao_hang'))
                                    {{ 'Đã giao hàng' }}
                                @elseif($invoice->status == config('common.invoice.status.chuyen_hoan'))
                                    {{ 'Chuyển hoàn' }}
                                @elseif($invoice->status == config('common.invoice.status.da_huy'))
                                    {{ 'Đã hủy' }}
                                @endif
                            </td>
                            <td>{{ $invoice->create_at }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
