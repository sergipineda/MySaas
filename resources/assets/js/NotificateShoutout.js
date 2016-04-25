/**
 * Created by sergi on 25/04/16.
 */
var notifyUser = function (data) {
    var shoutout = data.shoutout;
    var atribut2 = data.atribut2;

    if (! ('Notification' in window)) {
        alert('Web Notification is not supported');

        return;
    }

    Notification.requestPermission(function(permission){
        var notification = new Notification('@'+ data.handle +' said:', {
            body: shoutout.content,
            icon: document.getElementById('site_image').content
        });
    });

    var loadPusher = function (){
        Pusher.log = function(message) {
            if (window.console && window.console.log) {
                window.console.log(message);
            }
        };

        var pusher = new Pusher('122ceaa5253010316331', {
            cluster: 'eu',
            encrypted: true
        });

        var channel = pusher.subscribe('test_channel');
        channel.bind('my_event', function(data) {
            alert(data.message);
        });
        channel.bind('App\\Events\\ShoutoutAdded', notifyUser);
        //channel.bind('App\\Events\\ShoutoutAdded', window.console.log('Ok'));


        }
};
