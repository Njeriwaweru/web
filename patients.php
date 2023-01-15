<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient Information</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="wrapper">
        <nav>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="medicines.php">Medicines</a></li>
                <li><a href="ordering.php">Orders</a></li>
                <li><a href="patients.php" class="active">Patients</a></li>
                <li><a href="prescription.php">Prescribe</a></li>
            </ul>
            <?php
                if(isset($_SESSION['name'])){
                    echo "<form action='logic/logout.php' method='POST' class='loggedUser'><input type='submit' value = 'Welcome, ".$_SESSION['name']."'></form>";
                }
            ?>
        </nav>
        <section id="patients_container">
            <h1>Patients</h1>
            <!-- <div class="search_patient">
                <input type="text" placeholder="Search for a patient" name="search" id="search_input">
                <button class="button" id="search_patient">Search</button>
            </div> -->
            <div class="patient_details">
                <table id="patients_table">
                    <th>
                        <td class="th">Name</td>
                        <td class="th">Ailment</td>
                        <td class="th">Drug</td>
                        <td class="th">Prescription</td>
                        <td class="th">Quantity</td>
                        <td class="th">Status</td>
                    </th>
                </table>
            </div>
        </section>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js" integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script>
        const patients_table = document.getElementById("patients_table");
        /*const search_patient = document.getElementById("search_patient");*/
        /*const search_input = document.getElementById("search_input").value;*/
        document.addEventListener('DOMContentLoaded', getPatients);

        /*search_patient.addEventListener('click', ()=>{
            if(search_input != null){
                $.ajax({
                    url: 'logic/searchPatients.php',
                    method: 'GET',
                    data: {search: search_input},
                    success: function(data){
                        console.log(JSON.parse(data).patients)
                        patients_table.innerHTML = `
                        <th>
                            <td class="th">Name</td>
                            <td class="th">Ailment</td>
                            <td class="th">Drug</td>
                            <td class="th">Prescription</td>
                            <td class="th">Quantity</td>
                            <td class="th">Status</td>
                            <td class="th">Delete</td>
                        </th>
                        `;
                        const patients  = (JSON.parse(data).patients);
                        patients.forEach(patient => {
                            const tr = document.createElement('tr');
                            const td2 = document.createElement('td');
                            td2.textContent = patient.FirstName + ' '+ patient.LastName;
                            const td3 = document.createElement('td');
                            td3.textContent = patient.Ailment;
                            const td4 = document.createElement('td');
                            td4.textContent = patient.drug;
                            const td5 = document.createElement('td');
                            td5.textContent = patient.Prescription;
                            const td6 = document.createElement('td');
                            td6.textContent = patient.Quantity;
                            const td7 = document.createElement('td');
                            td7.textContent = patient.pstate;
                            const td8 = document.createElement('td');
                            const delet = document.createElement('button');                            
                            delet.textContent = "Delete";
                            td8.append(delet);

                            tr.append(td2)
                            tr.append(td3)
                            tr.append(td4)
                            tr.append(td5)
                            tr.append(td6)
                            tr.append(td7)
                            tr.append(td8)
                            patients_table.append(tr)
                        })
                    }
                })
            }else{
                console.log("empty")
            }
        })*/

        function getPatients(){
            $.ajax({
                url: 'logic/getPatients.php',
                method: 'GET',
                success: function(data){
                    console.log(data)
                    patients_table.innerHTML = `
                    <th>
                        <td class="th">Name</td>
                        <td class="th">Ailment</td>
                        <td class="th">Drug</td>
                        <td class="th">Prescription</td>
                        <td class="th">Quantity</td>
                        <td class="th">Status</td>
                        <td class="th">Delete</td>
                    </th>
                    `;
                    const patients  = (JSON.parse(data).patients);
                    patients.forEach(patient => {
                        const tr = document.createElement('tr');
                        const td2 = document.createElement('td');
                        td2.textContent = patient.FirstName + ' '+ patient.LastName;
                        const td3 = document.createElement('td');
                        td3.textContent = patient.Ailment;
                        const td4 = document.createElement('td');
                        td4.textContent = patient.drug;
                        const td5 = document.createElement('td');
                        td5.textContent = patient.Prescription;
                        const td6 = document.createElement('td');
                        td6.textContent = patient.Quantity;
                        const td7 = document.createElement('td');
                        td7.textContent = patient.pstate;
                        const td8 = document.createElement('td');
                        const delet = document.createElement('button');
                        delet.className = "button";
                        delet.addEventListener('click', ()=>{
                            $.ajax({
                                url: 'logic/deletePatient.php',
                                method: 'GET',
                                data: {id: patient.ID},
                                success: function(data){
                                    console.log(JSON.parse(data).msg);
                                }
                            })
                        })                            
                        delet.textContent = "Delete";
                        td8.append(delet);

                        tr.append(td2)
                        tr.append(td3)
                        tr.append(td4)
                        tr.append(td5)
                        tr.append(td6)
                        tr.append(td7)
                        tr.append(td8)
                        patients_table.append(tr)
                    })
                }
            })
        }
    </script>
</body>
</html>