@section('content')
    <table id="crudTable" class="bg-white table table-striped table-hover nowrap rounded shadow-xs border-xs mt-2 dataTable dtr-inline" data-responsive-table="1" data-has-details-row="0" data-has-bulk-actions="0" data-has-line-buttons-as-dropdown="0" cellspacing="0" aria-describedby="crudTable_info"><thead>
        <tr>
            <th data-orderable="true" data-priority="0" data-column-name="name" data-visible-in-table="false" data-visible="true" data-can-be-visible-in-table="true" data-visible-in-modal="true" data-visible-in-export="true" data-force-export="false" class="sorting" tabindex="0" aria-controls="crudTable" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending">
                Porta
            </th>
            <th data-orderable="false" data-priority="1" data-column-name="users_count" data-visible-in-table="false" data-visible="true" data-can-be-visible-in-table="true" data-visible-in-modal="true" data-visible-in-export="true" data-force-export="false" class="sorting_disabled" rowspan="1" colspan="1" aria-label="Users">
                Stato
            </th>
            <th data-orderable="false" data-priority="2" data-column-name="permissions" data-visible-in-table="false" data-visible="true" data-can-be-visible-in-table="true" data-visible-in-modal="true" data-visible-in-export="true" data-force-export="false" class="sorting_disabled" rowspan="1" colspan="1" aria-label="Permissions">
                Aperto per
            </th>
            <th data-orderable="false" data-priority="1" data-visible-in-export="false" data-action-column="true" class="sorting_disabled" rowspan="1" colspan="1" aria-label="Actions">
                Actions
            </th>
        </tr>
    </thead>
        <tbody>
            @foreach ($ip_list as $port)
                <tr class="odd">
                    <td class="dtr-control">
                        <span>{{$port['name']}} ({{$port['port']}})</span>
                    </td>
                    <td>
                        <span>{{$port['status']}}</span>
                    </td>
                    <td>
                        <span>
                            @foreach ($port['ip_addresses'] as $ip)
                                <span class="d-inline-flex">{{$ip}} </span>
                            @endforeach
                        </span>
                    </td>
                    <td>
                    </td>
                </tr>
            @endforeach    
        </tbody>
    </table><br><br>
    <h2>Gestione Server</h2>
    <div class="container">
        <ul class="list-group">
            @foreach ($servers as $server)
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <div class="d-flex align-items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill=" @if (!$server->status) red @else green @endif" class="bi bi-circle-fill" viewBox="0 0 16 16">
                            <circle cx="8" cy="8" r="8"/>
                        </svg>&nbsp;
                        {{$server->nome}}
                    </div>
                    <div>
                    @if (!$server->status)
                    <a href="startstop/{{$server->id}}" class="btn btn-success">Accendi</a>
                    @elseif ($server->status)
                    <a href="startstop/{{$server->id}}" class="btn btn-danger ml-2" >Spegni</a>
                    @endif
                    </div>
                </li>
            @endforeach
        </ul>
      </div>
      
@endsection
@extends(backpack_view('blank'))
