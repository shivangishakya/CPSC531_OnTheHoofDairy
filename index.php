<?php include 'dbconnect.php'; ?>
<!DOCTYPE html>
<html lang="en">
    <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
    <title>Business website</title>
    </head>
<header>

<nav>
    <ul class="mainMenu">
        <li><a href="#">Home</a></li>
        <li><a href="#">About</a></li>
        <li><a href="#">Services</a>
         <ul class="subMenu">
             <li><a href="#">Cow</a>
                <ul class="SuperSubMenu">
                     <li><a>Cow Data</a>
                         <ul class="SuperSubMenu">
                             <li><a href="Cow/AddCow.php">Add</a></li>
                             <li><a href="Cow/CowView.php">View</a></li>
                             <li><a href="Cow/UpdateCow.php">Update</a></li>
                             <li><a href="Cow/DelCow.php">Delete</a></li>
                         </ul>
                      </li>
                      <li><a>Herd Data</a>
                         <ul class="SuperSubMenu">
                             <li><a href="Cow/AddHerd.php">Add</a></li>
                             <li><a href="Cow/HerdView.php">View</a></li>
                             <li><a href="Cow/UpdateHerd.php">Update</a></li>
                             <li><a href="Cow/DelHerd.php">Delete</a></li>
                         </ul>
                        </li>
                        <li><a>Milk Production</a>
                         <ul class="SuperSubMenu">
                             <li><a href="Cow/AddMilk.php">Add</a></li>
                             <li><a href="Cow/MilkView.php">View</a></li>
                             <li><a href="Cow/UpdateMilk.php">Update</a></li>
                             <li><a href="Cow/DelMilk.php">Delete</a></li>
                         </ul>
                        </li>
                        <li><a>Birth Production</a>
                         <ul class="SuperSubMenu">
                             <li><a href="Cow/AddBirth.php">Add</a></li>
                             <li><a href="Cow/BirthView.php">View</a></li>
                             <li><a href="Cow/UpdateBirth.php">Update</a></li>
                             <li><a href="Cow/DelBirth.php">Delete</a></li>
                         </ul>
                      </li>
                    </ul>
                 </li>
             <li><a href="#">Feed</a>
                <ul class="SuperSubMenu">
                     <li><a>Item Information</a>
                         <ul class="SuperSubMenu">
                             <li><a href="Feed/AddItem.php">Add</a></li>
                             <li><a href="Feed/ItemView.php">View</a></li>
                             <li><a href="Feed/UpdateItem.php">Update</a></li>
                             <li><a href="Feed/DelItem.php">Delete</a></li>
                         </ul>
                      </li>
                      <li><a>Supplier Information</a>
                         <ul class="SuperSubMenu">
                             <li><a href="Feed/AddSupplier.php">Add</a></li>
                             <li><a href="Feed/SupplierView.php">View</a></li>
                             <li><a href="Feed/UpdateSupplier.php">Update</a></li>
                             <li><a href="Feed/DelSupplier.php">Delete</a></li>
                         </ul>
                        </li>
                        <li><a>Purchase</a>
                         <ul class="SuperSubMenu">
                             <li><a href="Feed/AddPurchase.php">Add</a></li>
                             <li><a href="Feed/PurchaseView.php">View</a></li>
                             <li><a href="Feed/UpdatePurchase.php">Update</a></li>
                             <li><a href="Feed/DelPurchase.php">Delete</a></li>
                         </ul>
                        </li>
                        <li><a>Feed Information</a>
                         <ul class="SuperSubMenu">
                             <li><a href="Feed/AddFeedInfo.php">Add</a></li>
                             <li><a href="Feed/FeedInfoView.php">View</a></li>
                             <li><a href="Feed/UpdateFeedInfo.php">Update</a></li>
                             <li><a href="Feed/DelFeedInfo.php">Delete</a></li>
                         </ul>
                      </li>
                    </ul>
                 </li>
             <li><a href="#">Medical</a>
                 <ul class="SuperSubMenu">    
                     <li><a>Medical history and Treatment</a>
                         <ul class="SuperSubMenu">
                             <li><a href="Medical/AddHistory.php">Add</a></li>
                             <li><a href="Medical/MedicalView.php">View</a></li>
                             <li><a href="Medical/UpdateHistory.php">Update</a></li>
                             <li><a href="Medical/DelHistory.php">Delete</a></li>
                         </ul>
                      </li>
                      <li><a>Vet Information</a>
                         <ul class="SuperSubMenu">
                             <li><a href="Medical/AddVet.php">Add</a></li>
                             <li><a href="Medical/VetView.php">View</a></li>
                             <li><a href="Medical/UpdateVet.php">Update</a></li>
                             <li><a href="Medical/DelVet.php">Delete</a></li>
                         </ul>
                        </li>
                        <li><a>Disease</a>
                         <ul class="SuperSubMenu">
                             <li><a href="Medical/AddDisease.php">Add</a></li>
                             <li><a href="Medical/DiseaseView.php">View</a></li>
                             <li><a href="Medical/UpdateDisease.php">Update</a></li>
                             <li><a href="Medical/DelDisease.php">Delete</a></li>
                         </ul>
                        </li>
                    </ul>
                </li>
            </ul>
        </li>
    </ul>
</nav>   

<div class="welcome-text">
        <h1>
On the Hoof Dairy</h1>
<a href="#">Contact US</a>
    </div>
</header>
<style>
*{
    margin: 0;
    padding: 0;
}
body{
    font-family: 'Lato', sans-serif;
}
.wrapper{
    width: 1170px;
    margin: auto;
    align-items: left;
}
header{
    background: linear-gradient(rgba(0,0,0,0.8),rgba(0,0,0,0.8)),url(https://c4.wallpaperflare.com/wallpaper/584/85/234/cow-sunset-clouds-hd-3-brown-and-white-cows-wallpaper-thumb.jpg);
    height: 100vh;
    -webkit-background-size: cover;
    background-size: cover;
    background-position: center center;
    position: relative;
}
ul{
    margin: 0;
    padding: 0;
    list-style: none;
    align-items: left;
}

a{
    margin: 0;
    text-align: center;
    padding: 12px 15px 12px 15px;
    background: #5F6975;
    color: white;
    display: block;
    text-decoration: none;
}
.mainMenu>li{
    display: inline-block;
    margin-left: -5px;
}
li:hover>a{
    background: #4B545F;
    cursor: pointer;
}
.subMenu{
    position: absolute;
    display: none;
}
.subMenu li{
    border-top: 1px solid #575F6A;
    border-bottom: 1px solid #6B727C;
    position: relative;
}
.mainMenu>li:hover .subMenu{
    display: block;
}
.SuperSubMenu{
    position: absolute;
    top: 0;
    right: 0;
    -ms-transform: translate(100%,0);
    -webkit-transform: translate(100%,0);
    transform:translate(100%,0);
    display: none;
}
.subMenu li:hover>.SuperSubMenu{
    display: block;
}
.logo{
    float: left;
}
.logo img{
    width: 100%;
    padding: 15px 0;
}
.welcome-text{
    position: absolute;
    width: 600px;
    height: 300px;
    margin: 20% 30%;
    text-align: center;
}
.welcome-text h1{
    text-align: center;
    color: #fff;
    text-transform: uppercase;
    font-size: 60px;
}
.welcome-text a{
    border: 1px solid #fff;
    padding: 10px 25px;
    text-decoration: none;
    text-transform: uppercase;
    font-size: 14px;
    margin-top: 20px;
    display: inline-block;
    color: #fff;
}
.welcome-text a:hover{
    background: #fff;
    color: #333;
}

/*resposive*/

@media (max-width:600px){
    .wrapper {
width: 100%;
align-self: left;
}
.logo {
float: none;
width: 50%;
text-align: center;
margin: auto;
}
img {
width: ;
}

    .welcome-text {
width: 100%;
height: auto;
margin: 30% 0;
}
    .welcome-text h1 {
font-size: 30px;
}
}


</style>
<body>


</body>
  
</html>

