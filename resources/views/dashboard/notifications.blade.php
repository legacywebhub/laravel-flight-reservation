@extends('dashboard.layout')

@section('title')
{{ $company->name }} | Notifications
@endsection

@section('content')
<div class="col-lg-10 col-md-10 col-sm-9 col-lg-push-2 col-md-push-2 col-sm-push-3">
    <div class="row mrg-0 mrg-top-20">
        <div class="tr-single-box">
            <div class="tr-single-header">
                <h3 class="dashboard-title">Messages</h3>
            </div>
            <div class="tr-single-body">
                <!-- row -->
                <div class="row">
                    <div class="inbox-message">
                        <ul>
                            @if(count($notifications) > 0)
                                @foreach($notifications as $notification)
                                <li>
                                    <div class="message-avatar">
                                        <img src="assets/img/user-1.jpg" alt="">
                                    </div>
                                    <div class="message-body">
                                        <div class="message-body-heading">
                                            <h5>Daniel Dock <span class="unread">Unread</span></h5>
                                            <span>7 hours ago</span>
                                        </div>
                                        <p>{{ $notification->message }}</p>
                                    </div>
                                </li>
                                @endforeach
                            @else
                            <li>
                                No Messages Yet
                            </li>
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection