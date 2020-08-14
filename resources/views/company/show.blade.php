@extends('layout.layoutmain')

@section('content')
    <div class="container">
        <h2>ROE Summary Detail</h2>
        <h3>{{ $company->CMGUnmaskedName }}</h3>
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ROE_FY14</th>
                        <th>ROE_FY15</th>
                        <th>REVENUE_FY14</th>
                        <th>REVENUE_FY15</th>
                        <th>RWAFY14</th>
                        <th>RWAFY15</th>
                        <th>TotalLimits_EOP_FY14</th>
                        <th>TotalLimits_EOP_FY15</th>
                        <th>Com_Avg_Act_FY14</th>
                        <th>Com_Avg_Act_FY15</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{ $company->ROE_FY14 }}</td>
                        <td>{{ $company->ROE_FY15 }}</td>
                        <td>{{ $company->REVENUE_FY14 }}</td>
                        <td>{{ $company->REVENUE_FY15 }}</td>
                        <td>{{ $company->RWAFY14 }}</td>
                        <td>{{ $company->RWAFY15 }}</td>
                        <td>{{ $company->TotalLimits_EOP_FY14 }}</td>
                        <td>{{ $company->TotalLimits_EOP_FY15 }}</td>
                        <td>{{ $company->Company_Avg_Activity_FY14 }}</td>
                        <td>{{ $company->Company_Avg_Activity_FY15 }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection
