<?php
session_start();

if($_SERVER['REQUEST_METHOD']=='POST'){
    if(isset($_POST['add'])){
        if(isset($_SESSION['cart'])){

            $items=array_column($_SESSION['cart'], 'name');
            if(in_array($_POST['name'], $items))
            {
                echo "<script>
                        alert('Item already added');
                        window.location.href='menu_checkout.php';
                    </script>";
            }
            else{
                $count=count($_SESSION['cart']);
                $_SESSION['cart'][$count]= array('name'=>$_POST['name'], 'price'=>$_POST['price'], 'quantity'=>1);
                    echo "<script>
                                    alert('Item already added');
                                    window.location.href='menu_checkout.php';
                                </script>";
            }
        }
        else{
            $_SESSION['cart'][0] = array('name'=>$_POST['name'], 'price'=>$_POST['price'], 'quantity'=>1);
                echo "<script>
                            alert('Item already added');
                            window.location.href='menu_checkout.php';
                        </script>";
        }

    }  
    if(isset($_POST['remove'])){
            foreach($_SESSION['cart'] as $key=>$value){
                if($value['name']==$_POST['name']){
                    unset($_SESSION['cart'][$key]);
                    $_SESSION['cart']= array_values($_SESSION['cart']);
                    echo "<script>alert('Item already removed!');
                            window.location.href='checkout.php';</script>";
                }
            }
        }     
   
}
?>