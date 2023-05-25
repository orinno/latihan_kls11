@foreach($categories as $category)
<script>
    function createPDF() {
        var sTable = document.getElementById('box').innerHTML;

        var style = "<style>";
        style = style + "* {font-size: 12px; font-family: sans-serif}";
        style = style + "table {width: 100%; margin-bottom: 3em; margin-top: 2em; font-size: 12px}";
        style = style + "th {font-size: 12px}";
        style = style + "table, th, td {border: solid 1px #DDD; border-collapse: collapse; border-color: black;";
        style = style + "padding: 2px 3px;text-align: center;}";
        style = style + ".dataTables_length {display: none}";
        style = style + ".dataTables_info {display: none}";
        style = style + ".dataTables_paginate {display: none}";

        style = style + ".dataTables_filter {display: none}";

        style = style + "p {margin: 0;}";
        style = style + ".hiden {display: none;}";
        style = style + ".text-center {text-align: center}";
        style = style + "</style>";

        // CREATE A WINDOW OBJECT.
        var win = window.open('', '', 'height=700,width=700');

        win.document.write('<html><head>');
        win.document.write('<title>List Category</title>');   // <title> FOR PDF HEADER.
        win.document.write(style);          // ADD STYLE INSIDE THE HEAD TAG.
        win.document.write('</head>');
        win.document.write('<body>');
        
        win.document.write('<h3 class="text-center">List Category</h3>');

        win.document.write(sTable);         // THE TABLE CONTENTS INSIDE THE BODY TAG.
        
        win.document.write('</body></html>');

        win.document.close(); 	// CLOSE THE CURRENT WINDOW.

        win.print();    // PRINT THE CONTENTS.
    }
</script>
@endforeach