$(document).ready(function () {
    if (!Notification) {
        console.log('Desktop notifications are not available in your browser.');
        return;
    } else {

    }

    if (Notification.permission !== 'granted') {
        Notification.requestPermission();
    } else {
        console.log('granted');
    }

    setInterval(function () {
        $.ajax({
            url: "/browser_notifications",
            type: "GET",
            dataType: 'json',
            success: function (_response) {
                let notifications = _response

                if (notifications.length > 0) {

                    Livewire.emit('refreshNotificationsIndex');

                    if (notifications.length > 5) {
                        showNotification("Nowe powiadomienia", "Zobacz nowe powiadomienia", "/notifications")

                        for (let i in notifications) {
                            markAsShowed(notifications[i].id)
                        }
                    } else {
                        for (let i in notifications) {
                            showNotification(notifications[i].title, notifications[i].content, notifications[i].link)
                            markAsShowed(notifications[i].id)
                        }
                    }
                }
            }
        });
    }, 10 * 1000);//Co 10 sekund
});

function showNotification(title, content, link) {
    if (Notification.permission !== 'granted') {
        Notification.requestPermission();
    } else {
        const options = {
            body: content,
            duration: 60000,
            // image: 'favicon.ico'
        };
        const notification = new Notification(title, options);

        notification.onclick = function () {
            window.open(link);
        };
    }
}

function markAsShowed(notificationId) {
    $.ajax({
        url: "/browser_notifications/" + notificationId,
        type: "PUT",
    });
}
