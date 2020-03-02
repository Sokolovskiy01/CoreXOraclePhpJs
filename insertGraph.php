<html>
<head>
    <meta charset="utf-8"/>
</head>
<body>
    <form method="post">
        <input type="text" name="Price" />
        <label for="Price">Цена NOT NULL</label><br />
        <input type="text" name="Graphics_par" />
        <label for="Graphics_par">Фирма NOT NULL</label><br />
        <input type="text" name="Graphics_man" />
        <label for="Graphics_man">Производитель NOT NULL</label><br />
        <input type="text" name="Graphics_fam" />
        <label for="Graphics_fam">Семейство NOT NULL</label><br />
        <input type="text" name="Graphics_mem_clock" />
        <label for="Graphics_mem_clock">Частота памяти NOT NULL</label><br />
        <input type="text" name="Graphics_mem_capacity" />
        <label for="Graphics_mem_capacity">Объем памяти NOT NULL</label><br />
        <input type="text" name="Graphics_mem_type" />
        <label for="Graphics_mem_type">Тип пямяти NOT NULL</label><br />
        <input type="text" name="Graphics_bus" />
        <label for="Graphics_bus">Шина NOT NULL</label><br />
        <input type="text" name="Graphics_power" />
        <label for="Graphics_power">Питание NOT NULL</label><br />
        <input type="text" name="Graphics_core_base" />
        <label for="Graphics_core_base">Частота ядра базовая NOT NULL</label><br />
        <input type="text" name="Graphics_core_max" />
        <label for="Graphics_core_max">Частота ядра разогнанная NOT NULL</label><br />
        <select name="Graphics_vr">
            <option value="null">None</option>
            <option value="T">True</option>
            <option value="F">False</option>
        </select>
        <label for="Graphics_vr">Vr ready</label><br />
        <select name="Graphics_raytracing" required="">
            <option value="null">None</option>
            <option value="T">True</option>
            <option value="F">False</option>
        </select>
        <label for="Graphics_raytracing">Raytracing</label><br />
        <input type="text" name="Graphics_outputs" />
        <label for="Graphics_outputs">Разъемы (через пробел) NOT NULL</label><br />
        <input type="text" name="Graphics_max_scr" />
        <label for="Graphics_max_scr">Через x</label><br />
        <input type="text" name="Graphics_add_pow" />
        <label for="Graphics_add_pow">Доп питание</label><br />
        <input type="text" name="Graphics_size_width" />
        <label for="Graphics_size_width">Габариты ширина</label><br />
        <input type="text" name="Graphics_size_height" />
        <label for="Graphics_asize_height">Габариты высота</label><br />
        <input type="text" name="Graphics_size_z" />
        <label for="Graphics_size_z">Габариты глубина</label><br />

        <button type="submit" name="submit">submit</button>
    </form>
</body>
</html>
<?php
    $conn = oci_connect("Web_DB", "Web_DB", "//localhost:1521/xe");
    if($conn) echo 'connected';
    if(isset($_POST['submit'])){
        if(!empty($_POST['Price']) && !empty($_POST['Graphics_par']) && !empty($_POST['Graphics_man']) && !empty($_POST['Graphics_fam']) && !empty($_POST['Graphics_mem_clock'])
        && !empty($_POST['Graphics_mem_capacity']) && !empty($_POST['Graphics_mem_type']) && !empty($_POST['Graphics_bus']) && !empty($_POST['Graphics_power'])
        && !empty($_POST['Graphics_core_base']) && !empty($_POST['Graphics_core_max']) && !empty($_POST['Graphics_outputs'])){
              $Graph_price = $_POST['Price'];
              $Graph_par = $_POST['Graphics_par']; $Graph_man = $_POST['Graphics_man'];
              $Graph_fam = $_POST['Graphics_fam']; $Graph_mem_c = $_POST['Graphics_mem_clock'];
              $Graph_mem_cap = $_POST['Graphics_mem_capacity']; $Graph_mem_t = $_POST['Graphics_mem_type'];
              $Graph_b = $_POST['Graphics_bus']; $Graph_pow = $_POST['Graphics_power'];
              $Graph_cl_b = $_POST['Graphics_core_base']; $Graph_cl_m = $_POST['Graphics_core_max'];
              if($Graph_vr_r = $_POST['Graphics_vr'] == 'null') $Graph_vr_r = null; if($Graph_ray = $_POST['Graphics_raytracing'] == 'null') $Graph_ray = null;
              $Graph_out = $_POST['Graphics_outputs']; $Graph_max_s =$_POST['Graphics_max_scr'];
              $Graph_add_p = $_POST['Graphics_add_pow']; $Graph_size_w = $_POST['Graphics_size_width'];
              $Graph_size_h = $_POST['Graphics_size_height']; $Graph_size_z = $_POST['Graphics_size_z'];

              $sql1 = "INSERT INTO Product VALUES(sekw_product.nextval,'" . $Graph_price . "','" . $Graph_fam . "', 'gpu.png' , sekw_product.nextval || '.png' , 'Memory size' ,'" . $Graph_mem_cap . "', 'Memory Clock' ,'" . $Graph_mem_c . " MHz', 'Base clock ' ,'" . $Graph_cl_b . " MHz', 'T' )";
              $sql2 = "INSERT INTO Graphics VALUES(sekw_graph.nextval,sekw_product.currval,'". $Graph_par ."','" . $Graph_man . "','" . $Graph_fam . "','" . $Graph_mem_c . "','" . $Graph_mem_cap . "','" . $Graph_mem_t . "','" . $Graph_b . "'," . $Graph_pow . "," . $Graph_cl_b . "," . $Graph_cl_m .",'" . $Graph_vr_r . "','" . $Graph_ray ."','" . $Graph_out ."','" . $Graph_max_s . "','" . $Graph_add_p ."'," . $Graph_size_w ."," . $Graph_size_w .",". $Graph_size_z .")";
              
              $stid1 = oci_parse($conn, $sql1);
              $stid2 = oci_parse($conn, $sql2);

              echo $sql1 . '<br/>';
              echo $sql2;

              oci_execute($stid1);
              oci_execute($stid2);

		}else echo 'false_not_null';


        oci_close($conn);
    }
?>

<!--INSERT INTO Product VALUES(sekw_product.nextval,629.40,'GeForce RTX 2070 Super','gpu.png',sekw_product.nextval || '.png','Memory size','8 GB','Memory Clock','14000 MHz','Base clock ','1605 MHz','T');
INSERT INTO Graphics VALUES(sekw_graph.nextval,sekw_product.currval,'NVIDIA','Gigabyte','GeForce RTX 2070 Super','14000','8 GB','GDDR6','256 bit',650,1815,1945,'T','T','DisplayPort HDMI','7680x4320','6 + 8 pin',286.5,50.2,114.5);-->