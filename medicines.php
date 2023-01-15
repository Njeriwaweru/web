<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Medicine</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="wrapper">
        <nav>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="medicines.php" class="active">Medicines</a></li>
                <li><a href="ordering.php">Order</a></li>
                <li><a href="patients.php">Patients</a></li>
                <li><a href="prescription.php">Prescribe</a></li>
            </ul>
            <?php
                if(isset($_SESSION['name'])){
                    echo "<form action='logic/logout.php' method='POST' class='loggedUser'><input type='submit' value = 'Welcome, ".$_SESSION['name']."'></form>";
                }
            ?>
        </nav>
        <section id="medicine_container">
            <h1>Medicine</h1>
            <div class="search_medicine">
                <!-- <input type="search" name="search" id="search_input" placeholder="Search for medicine..."> -->
                <!-- <button class="button" id="search_medicine">Search</button> -->
                <button style="margin-left: 40px;" class="button" onclick="window.location.href = 'add_med.php';">Add New Medicine</button>
                <button class="button" onclick="window.location.href = 'ordering.php';">Order</button>
            </div>
            <div class="patient_details">
                <table id="medicine_table">
                    <th>
                        <td class="th">Name</td>
                        <td class="th">Quantity</td>
                        <td class="th">Prescription</td>
                        <td class="th">Supplier</td>
                        <td class="th">Delete</td>
                    </th>
                </table>
            </div>
        </section>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js" integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        const medicine_table = document.getElementById("medicine_table");
        /*const search_medicine = document.getElementById("search_medicine");*/
        /*const search_input = document.getElementById("search_input").value;*/
        document.addEventListener('DOMContentLoaded', getMedicine);

        /*search_medicine.addEventListener('click', ()=>{
            if(search_input != ''){
                $.ajax({
                    url: 'logic/searchMedicine.php',
                    method: 'GET',
                    data: {search: search_input},
                    success: function(data){
                        console.log(data);
                        medicine_table.innerHTML = `
                        <th>
                            <td class="th">Name</td>
                            <td class="th">Quantity</td>
                            <td class="th">Prescription</td>
                            <td class="th">Supplier</td>
                        </th>
                        `;
                        const medicines  = (JSON.parse(data).medicine);
                        medicines.forEach(medicine => {
                            const tr = document.createElement('tr');
                            const td2 = document.createElement('td');
                            td2.textContent = medicine.MedicineName;
                            const td3 = document.createElement('td');
                            td3.textContent = medicine.Quantity;
                            const td4 = document.createElement('td');
                            td4.textContent = medicine.MedicineCode;
                            const td5 = document.createElement('td');
                            td5.textContent = medicine.supplier;
                            tr.append(td2)
                            tr.append(td3)
                            tr.append(td4)
                            tr.append(td5)
                            medicine_table.append(tr)
                        })
                    }
                })
            }
        })*/

        function getMedicine(){
            $.ajax({
                url: 'logic/getMedicine.php',
                method: 'GET',
                success: function(data){
                    medicine_table.innerHTML = `
                    <th>
                        <td class="th">Name</td>
                        <td class="th">Quantity</td>
                        <td class="th">Code</td>
                        <td class="th">Supplier</td>
                        <td class="th">Delete</td>
                    </th>
                    `;
                    const medicines  = (JSON.parse(data).medicine);
                    medicines.forEach(medicine => {
                        const tr = document.createElement('tr');
                        const td2 = document.createElement('td');
                        td2.textContent = medicine.MedicineName;
                        const td3 = document.createElement('td');
                        td3.textContent = medicine.Quantity;
                        const td4 = document.createElement('td');
                        td4.textContent = medicine.MedicineCode;
                        const td5 = document.createElement('td');
                        td5.textContent = medicine.supplier;
                        const td6 = document.createElement('td');
                        const delet = document.createElement('button');
                        delet.className = "button";
                        delet.addEventListener('click', ()=>{
                            $.ajax({
                                url: 'logic/deleteMedicine.php',
                                method: 'GET',
                                data: {id: medicine.ID},
                                success: function(data){
                                    console.log(JSON.parse(data).msg);
                                }
                            })
                        })                            
                        delet.textContent = "Delete";
                        td6.append(delet);
                        tr.append(td2)
                        tr.append(td3)
                        tr.append(td4)
                        tr.append(td5)
                        tr.append(td6)
                        medicine_table.append(tr)
                    })
                }
            })
        }
    </script>
</body>
</html>