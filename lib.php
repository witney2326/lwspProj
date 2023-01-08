<?php
    function pname($link, $pcode)
    {
    $rg_query = mysqli_query($link,"select pname from tproducts where pID='$pcode'"); // select query
    $rg = mysqli_fetch_array($rg_query);// fetch data
    return $rg['pname'];
    }

    function payment_option_name($link, $ocode)
    {
    $rg_query = mysqli_query($link,"select oName from payment_options where oID='$ocode'"); // select query
    $rg = mysqli_fetch_array($rg_query);// fetch data
    return $rg['oName'];
    }

    function hh_status($link, $scode)
    {
    $rg_query = mysqli_query($link,"select status from hh_project_status where id='$scode'"); // select query
    $rg = mysqli_fetch_array($rg_query);// fetch data
    return $rg['status'];
    }

    function product_cost($link, $pcode)
    {
    $rg_query = mysqli_query($link,"select pCost from tproducts where pID='$pcode'"); // select query
    $rg = mysqli_fetch_array($rg_query);// fetch data
    return $rg['pCost'];
    }

    function hh_selected_product($link, $hcode)
    {
    $rg_query = mysqli_query($link,"select selected_product from households where hhcode='$hcode'"); // select query
    $rg = mysqli_fetch_array($rg_query);// fetch data
    return $rg['selected_product'];
    }

    function hh_payment_option($link, $hcode)
    {
    $rg_query = mysqli_query($link,"select pOption from households where hhcode='$hcode'"); // select query
    $rg = mysqli_fetch_array($rg_query);// fetch data
    return $rg['pOption'];
    }

    function contractor_name($link, $ccode)
    {
    $rg_query = mysqli_query($link,"select cname from tcontractor where id='$ccode'"); // select query
    $rg = mysqli_fetch_array($rg_query);// fetch data
    return $rg['cname'];
    }

    function pstatus($link, $s_code)
    {
    $rg_query = mysqli_query($link,"select status from tproject_status where id='$s_code'"); // select query
    $rg = mysqli_fetch_array($rg_query);// fetch data
    return $rg['status'];
    }
    
    function con_name($link, $conID)
    {
    $dis_query = mysqli_query($link,"select cname from constituency where id='$conID'"); // select query
    $dis = mysqli_fetch_array($dis_query);// fetch data
    return $dis['cname'];
    }

    function ward_name($link, $wID)
    {
    $dis_query = mysqli_query($link,"select wname from wards where id='$wID'"); // select query
    $dis = mysqli_fetch_array($dis_query);// fetch data
    return $dis['wname'];
    }

    function area_name($link, $acode)
    {
    $rg_query = mysqli_query($link,"select aname from areas where areacode='$acode'"); // select query
    $rg = mysqli_fetch_array($rg_query);// fetch data
    return $rg['aname'];
    }

    function hh_name($link, $hcode)
    {
    $rg_query = mysqli_query($link,"select hhname from households where hhcode='$hcode'"); // select query
    $rg = mysqli_fetch_array($rg_query);// fetch data
    return $rg['hhname'];
    }

    function hh_id_found($link, $hcode)
    {
    $rg_query = mysqli_query($link,"select phhcode from tprojects where phhcode='$hcode'"); // select query
    $rg = mysqli_fetch_array($rg_query);// fetch data
    if ($rg['phhcode'] <> "")
    {return true;} else{return false;;}
    }

    function hh_plot($link, $hcode)
    {
    $rg_query = mysqli_query($link,"select plot from households where hhcode='$hcode'"); // select query
    $rg = mysqli_fetch_array($rg_query);// fetch data
    return $rg['plot'];
    }

    function hh_enroll_check($link, $hcode)
    {
    $rg_query = mysqli_query($link,"select enrolled from households where hhcode='$hcode'"); // select query
    $rg = mysqli_fetch_array($rg_query);// fetch data
    return $rg['enrolled'];
    }

    function hh_product_approved_check($link, $hcode)
    {
    $rg_query = mysqli_query($link,"select product_approved from households where hhcode='$hcode'"); // select query
    $rg = mysqli_fetch_array($rg_query);// fetch data
    return $rg['product_approved'];
    }

    function hh_ready_select_check($link, $hcode)
    {
    $rg_query = mysqli_query($link,"select ready_selection from households where hhcode='$hcode'"); // select query
    $rg = mysqli_fetch_array($rg_query);// fetch data
    return $rg['ready_selection'];
    }


    function role_name($link, $rcode)
    {
    $rg_query = mysqli_query($link,"select rolename from userroles where roleid='$rcode'"); // select query
    $rg = mysqli_fetch_array($rg_query);// fetch data
    return $rg['rolename'];
    }

    function agecat_name($link, $agecode)
    {
    $rg_query = mysqli_query($link,"select cat from age_category where id='$agecode'"); // select query
    $rg = mysqli_fetch_array($rg_query);// fetch data
    return $rg['cat'];
    }

    function livelihood_name($link, $livecode)
    {
    $rg_query = mysqli_query($link,"select livelihood from main_livelihood where id='$livecode'"); // select query
    $rg = mysqli_fetch_array($rg_query);// fetch data
    return $rg['livelihood'];
    }

    function hh_income($link, $incode)
    {
    $rg_query = mysqli_query($link,"select income from month_income where id='$incode'"); // select query
    $rg = mysqli_fetch_array($rg_query);// fetch data
    return $rg['income'];
    }

    function hh_homestatus($link, $hscode)
    {
    $rg_query = mysqli_query($link,"select status_ from home_status where id='$hscode'"); // select query
    $rg = mysqli_fetch_array($rg_query);// fetch data
    return $rg['status_'];
    }

    function hh_lzone($link, $hslcode)
    {
    $rg_query = mysqli_query($link,"select l_zone from location_zone where id='$hslcode'"); // select query
    $rg = mysqli_fetch_array($rg_query);// fetch data
    return $rg['l_zone'];
    }

    function hh_latrine($link, $hhlcode)
    {
    $rg_query = mysqli_query($link,"select type_ from hh_latrine where id='$hhlcode'"); // select query
    $rg = mysqli_fetch_array($rg_query);// fetch data
    return $rg['type_'];
    }


    function userid($link, $code)
    {
    $rg_query = mysqli_query($link,"select id from users where usercon='$code'"); // select query
    $rg = mysqli_fetch_array($rg_query);// fetch data
    return $rg['id'];
    }
    

    function send_whatsapp($message="Test"){
        $phone="+265888366747";  // Enter your phone number here
        $apikey="476943";       // Enter your personal apikey received in step 3 above
    
        $url='https://api.callmebot.com/whatsapp.php?source=php&phone='.$phone.'&text='.urlencode($message).'&apikey='.$apikey;
    
        if($ch = curl_init($url))
        {
            curl_setopt ($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt ($ch, CURLOPT_SSL_VERIFYPEER, 0);
            $html = curl_exec($ch);
            $status = curl_getinfo($ch, CURLINFO_HTTP_CODE);
            // echo "Output:".$html;  // you can print the output for troubleshooting
            curl_close($ch);
            return (int) $status;
        }
        else
        {
            return false;
        }
    }

    function send_func()
    {
    $phone='+265996941458';
    $apikey='476943';
    $message='This is a test from PHP';

    $url='https://api.callmebot.com/whatsapp.php?source=php&phone='.$phone.'&text='.urlencode($message).'&apikey='.$apikey;
    $html=file_get_contents($url);
    }
?>