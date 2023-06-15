

    $(document).ready(function(){  
        setInterval(function(){   
          $('#tf-refresh-status-total').load('totalTf');
        }, 1000);
    });
    $(document).ready(function(){  
        setInterval(function(){   
          $('#tf-refresh-status-ongoing').load('onGoingTf');
        }, 1000);
    });
