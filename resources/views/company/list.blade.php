@extends('layout.layoutmain')

@section('content')
<div class="container">
    <div class="page-header">
      <h1>List of company</h1>
    </div>

    <div class="row">
      <div class="col-xs-12">
        <div class="table-responsive">
          <table class="table table-bordered table-hover">
            <thead>
              <tr>
                <th>CMGUnmaskedID</th>
                <th>CMGUnmaskedName</th>
                <th>ClientTier</th>
                <th>GCPStream</th>
                <th>GCPBusiness</th>
                <th>CMGGlobalBU</th>
              </tr>
            </thead>
            <tbody>
              @foreach($company as $co)
              <tr>
                <td><a href="{{ route('company.show', $co->offset ) }}">{{ $co->CMGUnmaskedID }}</a></td>
                <td>{{ $co->CMGUnmaskedName }}</td>
                <td>{{ $co->ClientTier }}</td>
                <td>{{ $co->GCPStream }}</td>
                <td>{{ $co->GCPBusiness }}</td>
                <td>{{ $co->CMGGlobalBU }}</td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div><!--end of .table-responsive-->
      </div>
    </div>

    {{ $paginator->links() }}
@endsection
