
<html>
<head>
	<meta charset="utf-8">
	 <script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>

</head>
<body>

<h1>Тест</h1>


<a href="#" id="fpcsv";>Сформировать CSV</a><br />
<div id="usercontent"></div>
<a href="" id="exportsags">Загрузить</a>

<script charset="utf-8">

document.getElementById("exportsags").style.display="none"

$(document).ready(function()
            {
                $('#fpcsv').click(function()
                {
                    $.ajax(
                    {
                        url: "/fpcsv.php",
                        type: 'GET',
                        dataType: 'text',

                        success: function(data)
                        {
                          csvData = 'data:application/csv;charset=utf-8,'+ '\uFEFF' + encodeURIComponent(data);
                          $("#exportsags").attr({
                              "href": csvData,
                              "download": "sag_data.csv"
                          });

                            
                            document.getElementById("exportsags").style.display="block"                        
                            alert("Сформировано, жми загрузить!!!")
                        }
                    });
                });
                                       });
</script>

</body>
</html>