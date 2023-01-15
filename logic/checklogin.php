<?php      
    include 'conn.php';
    
    if(isset($_GET['submit'])){
        $username = $_GET['username'];  
        $password = $_GET['password']; 
        
        if(!empty($password) && !empty($username)){
            $sql = "SELECT * FROM employee WHERE username = ?";
            $prep_sql = $con->prepare($sql);
            $prep_sql->bind_param('s', $username);
            $prep_sql->execute();
            if($result = $prep_sql->get_result()){
                $employee = $result->fetch_assoc();
                $pass = $employee['password'];
                if($password == $pass){ 
                    session_start();
                    $_SESSION['name'] = $username;
            
                    header('Location: ../patients.php');
                    exit();
                }  
                else{  
                    header('Location: ../index.php?error=wrong');
                    exit(); 
                }
            }
        }else{  
            header('Location: ../index.php?error=empty');
            exit(); 
        }
    
    }
    