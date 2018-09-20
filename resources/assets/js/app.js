(function($) {

    $(document).ready(function() {
        $("#generator").click(function() {
            var colorNo = $('#color_number').val();

            if (colorNo < 2 || colorNo > 10) {
                alert("Trebuie furnizat un nr intre 2 si 10");
                return;
            }

            randomMatrix = getRandomBallArray(colorNo);
            console.log(randomMatrix);
            matrixDraw('#original_matrix_container', randomMatrix);           
            $("#original_matrix").val(JSON.stringify(randomMatrix));  
            getOrderedBallArray();
        });

        $("#redistribution_form").submit(function(e) {
            e.preventDefault();            
            saveOrderedBallArray();
        });
    });

    function getOrderedBallArray() {    
        let url = $('#generator').attr('data-url');      
        let token = $('#redistribution_form').find('input[name="_token"]').val();    
        $("#salveaza").prop("disabled", true);

        $.ajax({
            url: url,
            method: 'POST',           
            data: { 
                'color_number': $('#color_number').val(),
                'original_matrix': $('#original_matrix').val(),               
                '_token': token,               
            },
            dataType: 'json',
            success: function(data) {
                matrixDraw('#ordered_matrix_container', data);  
                console.log(data);  
                $("#ordered_matrix").val(JSON.stringify(data));                  
                $("#salveaza").removeAttr('disabled');
            }
        });       
    }  

    function saveOrderedBallArray() {    
        let url = $('#redistribution_form').attr('action');      
        let token = $('#redistribution_form').find('input[name="_token"]').val();    

        $.ajax({
            url: url,
            method: 'POST',           
            data: { 
                'color_number': $('#color_number').val(),
                'original_matrix': $('#original_matrix').val(),               
                'ordered_matrix': $('#ordered_matrix').val(),               
                '_token': token,               
            },
            dataType: 'json',
            success: function(data) {                            
               alert("Succes");
               $("#salveaza").prop("disabled", true);
            }
        });       
    } 
   
    function matrixDraw(el, randomMatrix) {        
        let l = randomMatrix.length;
        let $table = $('<table>', {'class': 'table text-center table-bordered table-sm '});
        
        for (let i = 0; i < l; i++) {
            let $tr = $('<tr>');
            for (let j = 0; j < l; j++) {
                let $span = $('<span>', {'class': 'dot c'+randomMatrix[i][j]}).html(randomMatrix[i][j]);                
                let $td = $('<td>').html($span);                
                $tr.append($td);
            }
            $table.append($tr);
        }
      
        $(el).empty().html($table);              
    }

    function getRandomBallArray(colorNo) {
        let totalBalls = colorNo * colorNo;
        let bList = [];

        for (let i = 1; i <= totalBalls; i++) {
            if (i <= colorNo) {
                bList.push(i);
                continue;
            }
            currColor = Math.floor(Math.random() * colorNo) + 1;
            bList.push(currColor);
        }
        bList = shuffle(bList);

        let randomMatrix = [];
        for (let i = 0; i < colorNo; i++) {
            let tmpList = [];
            for (let j = 0; j < colorNo; j++) {
                tmpList.push(bList.shift());
            }
            randomMatrix.push(tmpList);
        }

        return randomMatrix;
    }

    function shuffle(a) {
        for (let i = a.length - 1; i > 0; i--) {
            const j = Math.floor(Math.random() * (i + 1));
            [a[i], a[j]] = [a[j], a[i]];
        }
        return a;
    }

})(jQuery);