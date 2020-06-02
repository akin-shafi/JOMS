//this is being used in court||new
findJudgeByDivision = () => {
    var court_division = document.getElementById('court_division');
    var url = window.location.href;
    getUrl = "../../inc/filter.php?division_id="+court_division.value+'&filter=court';
    // console.log(getUrl);

    $.ajax({

        type: "GET",
        url: getUrl,
        
        success: function(r) {
        // console.log(r);
        $('.fil').html(r);

        },
        
        error:   function(r) {
        console.log(r);
        }

    });
};

//this is being used in judge_admin||new
findCourtByDivision = () => {
    var court_division = document.getElementById('court_division');
    var url = window.location.href;
    getUrl = "../../inc/filter.php?division_id="+court_division.value+'&filter=judge';
    // console.log(court_division);

    $.ajax({

        type: "GET",
        url: getUrl,
        
        success: function(r) {
        console.log(r);
        $('.fil').html(r);

        },
        
        error:   function(r) {
        console.log(r);
        }

    });
};