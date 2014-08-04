function openZoombox(url, w, h)
{
    $.zoombox.open(url,
        {
            theme: 'prettyphoto',
            width: 1024,
            height: 768
        }
    );
    $('#zoombox .close').click(function() {
        window.location.reload();
    });
    $('#zoombox .mask').click(function() {
        window.location.reload();
    });
    return false;
}

function openNZoombox(url, w, h)
{
    $.zoombox.open(url,
        {
            theme: 'prettyphoto',
            width: 1024,
            height: 768
        }
    );
    return false;
}