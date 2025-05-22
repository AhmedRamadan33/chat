<!-- main-header opened -->
<div class="main-header sticky side-header nav nav-item">
    <div class="container-fluid">
        <div class="main-header-left ">
            <div class="responsive-logo">
                <a href="#"><img src="{{ URL::asset('Dashboard/img/brand/logo.png') }}" class="logo-1"
                        alt="logo"></a>
                <a href="#"><img src="{{ URL::asset('Dashboard/img/brand/logo-white.png') }}" class="dark-logo-1"
                        alt="logo"></a>
                <a href="#"><img src="{{ URL::asset('Dashboard/img/brand/favicon.png') }}" class="logo-2"
                        alt="logo"></a>
                <a href="#"><img src="{{ URL::asset('Dashboard/img/brand/favicon.png') }}" class="dark-logo-2"
                        alt="logo"></a>
            </div>
            <div class="app-sidebar__toggle" data-toggle="sidebar">
                <a class="open-toggle" href="#"><i class="header-icon fe fe-align-left"></i></a>
                <a class="close-toggle" href="#"><i class="header-icons fe fe-x"></i></a>
            </div>
            
        </div>
     
    </div>
</div>
<!-- /main-header -->

<script src="https://code.jquery.com/jquery-3.5.1.min.js"
    integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script src="https://js.pusher.com/8.2.0/pusher.min.js"></script>

<script src="{{asset('js/app.js')}}"></script>


<script>
    var notificationsWrapper = $('.dropdown-notifications');
    var notificationsCountElem = notificationsWrapper.find('p[data-count]');
    var notificationsCount = parseInt(notificationsCountElem.data('count'));
    var notifications = notificationsWrapper.find('h4.notification-label');
    var new_message = notificationsWrapper.find('.new_message');
    new_message.hide();

    var pusher = new Pusher('46d7189298561c610e66', {
        cluster: 'mt1'
    });
    var channel = pusher.subscribe('create-doctor');
    channel.bind('my-event', function(data) {

        var newNotificationHtml = `
       <h4 class="notification-label mb-1">` + data.message + data.doctor + `</h4>
       <div class="notification-subtext">` + data.created_at + `</div>`;
        new_message.show();
        notifications.html(newNotificationHtml);
        notificationsCount += 1;
        notificationsCountElem.attr('data-count', notificationsCount);
        notificationsWrapper.find('.notif-count').text(`You have ` + notificationsCount +
            ` unread Notifications`);
        notificationsWrapper.show();
    });
</script>
