var inprogress = new Array();

function toggleParticipant( node, instance, person ) {
    if ( !inprogress[person] ) {
        inprogress[person] = true;
        var req = new Request.HTML({
            method: 'get',
            url: 'index.php/actionparticipants',
            data: { 'instance' : instance, 'person' : person },
            onRequest: function() { node.set('text', 'Updating participant...'); },
            update: node,
            onComplete: function(response) { inprogress[person] = false; }
        }).send();
    } else {
        alert('in progress');
    }
}
