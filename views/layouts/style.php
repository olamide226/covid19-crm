<style>
.notification .badge {
  position: absolute;
  top: -10px;
  right: 0px;
  padding: 5px 8px;
  border-radius: 50%;
  background-color: red;
  color: white;
  font-size:9.5px;
}
.notify .badge{
  /* right: 0px; */
  padding: 5px 8px;
  border-radius: 50%;
  background-color: red;
  color: white;
  font-size:9.5px;
}
 /* custom dropdown */
 /* .dropdown {
  float: left;
  overflow: hidden;
}

.dropdown .dropbtn {
  cursor: pointer;
  font-size: 16px;  
  border: none;
  outline: none;
  color: white;
  padding: 14px 16px;
  background-color: inherit;
  font-family: inherit;
  margin: 0;
}

.navbar a:hover, .dropdown:hover .dropbtn, .dropbtn:focus {
  background-color: red;
}

.dropdown-content a{
  display: none;
  position: absolute;
  background-color: #f9f9f9;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a {
  float: none;
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
  text-align: left;
}

.dropdown-content a:hover {
  background-color: #ddd;
}
.show {
  display: block;
} */
 /* end custom dropdown */

.fa-icon{
  /* color:#2F4F4F; */
  
  opacity:0.8;
  border: none;
  color: green;
  padding: 12px 16px;
  font-size: 25px;
  cursor: pointer;
  border-radius:100px;
  width:150;
}
.fa-icon:hover{
  /* color:#2F4F4F; */
  color: #2F4F4F;
 
}
h5{
  font-family:sans-serif;
}
/* dropdown menu background */
.drop-background{
  background-color: #6B8E23;
}

/* menu hover */
.nav > .nav-item > a.linked:hover,
.nav > .nav-item > a.linked:visited, 
.nav > .nav-item > a.linked:active { 
  transition: transform 1s; 
  background-color: #57812B; 
  border-radius:25px; 
  transform: scale(1);
  /* padding:10px ; #B5C24C*/
}
/* .nav > .nav-item > a.linked:visited, 
.nav > .nav-item > a.linked:active{
  background-color: #57812B;
} */
.nav > .nav-item > a.linked:focus  { 
  background-color:#5A852C ; 
}
/* custom buttons */
/* report buttons */
.r-btn{
    
    background-color:#32CD32;
    color:#fff;
}
.r-btn:hover{
    box-shadow: 0 14px 28px rgba(0,0,0,0.25), 0 10px 10px rgba(0,0,0,0.22);
    background-color:#006400;
    color:#fff;
}
/* report buttons ends here */
/* save buttons */
.btn-save{
  background-color: #32CD32;
  color:#fff;
  border:0px;
  padding: 12px 25px;
}
.btn-save:hover{
  background-color: #228B22;
  text-decoration:none;
  color:#fff;
  box-shadow: 0 10px 15px rgba(0,0,0,0.25), 0 3px 3px rgba(0,0,0,0.22);
  padding: 12px 32px;
}
/* save buttons ends here */
.btty-sm{
  background-color: #C0C0C0;
  color:#fff;
  border:0px;
  padding: 8px 15px;
  margin-left:3px;
}
.btty-del{
  background-color: red;
  color:#fff;
  border:0px;
  padding: 12px 25px;
  text-decoration: none;
}
.btty-del:hover{
  background-color: red;
  color:#fff;
  border:0px;
  padding: 12px 25px;
  text-decoration: none;
  box-shadow: 0 10px 15px rgba(0,0,0,0.25), 0 3px 3px rgba(0,0,0,0.22);
}
.btty{
  background-color: #C0C0C0;
  color:#fff;
  border:0px;
  padding: 12px 25px;
}
.btty:hover, .btty-sm:hover{
  background-color:#32CD32;
  text-decoration:none;
  color:#fff;
  box-shadow: 0 10px 15px rgba(0,0,0,0.25), 0 3px 3px rgba(0,0,0,0.22);
  /* padding: 12px 32px; */
}
/* button ends here */
a{
  color:#228B22;
}
.user-icon{
  color:#fff;
  font-weight:bold;font-size:15px;
}
.user-icon:hover{
  color:#59842B;
}

.button5 {border-radius: 50%; padding: 15px;}
#txt{font-size:15px}
.danger {
  border-color: transparent;
  color: black;
}
.danger:hover {
  background: transparent;
  
}
.bttn {
  /* border: 2px solid black; */
  background-color: transparent;
  padding: 10px ;
  border-radius: 50%;
  font-size:26px;
  font-family:Broadway;
  /* color: black;
  padding: 14px 28px;
  
  cursor: pointer; */
}
/* button used to open the chat form-fixed buttom  */
.open-button {
  /* background-color: #40E0D0; */
  color: #40E0D0;
  /*padding: 5px 5px; */
  cursor:pointer;
  /* opacity: 0.8; */
  position: fixed;
  bottom:0px;
  right:15px;
  /* width: 150px;
  border: 0px  solid #f1f1f1;  */
}
.btn-cancel{
  background-color:#C0C0C0;
  border:0px;
  font-size:15px;
  color:#fff;
}
.btn-cancel:hover{
  background-color:#2F4F4F;
  color:#fff;
}
.open-button:hover {
  color: #1E90FF;
}
.open-btn:hover{
  color:#FF1493
}
.open-btn{
  /* background-color: #555; */
  color: #F08080;
  /* padding: 5px 5px; */
  cursor:pointer;
  /* opacity: 0.8; */
  position: fixed;
  bottom:0px;
  right:100px;
  /* width: 150px; */
  /* border: 0px solid #f1f1f1; */
}
/* .btn-list li {
  display:inline-block;
} */
/* chat popup - hidden by default  */
.chat-popup {
  display: none;
  position: fixed;
  bottom:0;
  right: 15px;
  border: 3px solid #f1f1f1;
  z-index:9;
}
#myClient {
  display: none;
  position: fixed;
  bottom:0;
  right: 15px;
  border: 3px solid #f1f1f1;
  z-index:9;
}
/* add style to the form container */
.form-container{
  width:500px;
  padding-top : 0px;
  background-color:#fff;
  /* background-image: linear-gradient(-90deg, #7B68EE, #1E90FF,#87CEFA); */
}
/* full-width textarea */
.form-container textarea{
  width:100%;
  padding:0px;
  margin:5px 0 22px 0;
  /* border:none; */
  /* background: #f1f1f1; */
  resize:none;
  min-height:200px;
}
/* when textarea gets focus, do something */
.form-container textarea:focus{
  /* background-color:#ddd;
  outline:none; */
}
/* set a style for the submit/send button */
.from-container .btn{
  background-color:#4caf50;
  color:white;
  padding:16px 20px;
  border:none;
  cursor: pointer;
  width:100%;
  margin-bottom:10px;
  opacity:0.8;
}
/* add back-color to cancel btn */
.form-container .cancel{
  background-color:red;
}
/* add hover effect to buttons */
.form-container .btn:hover, .open-button:hover, .open-btn:hover{
  opacity:1;
}

/*for chat*/
.scrollbar {
margin-left: 2px;
float: left;
height: 300px;
width: 100%;
background: #2F4F4F;
overflow-y: scroll;
margin-bottom: 25px;
padding: 5px;
}

.scrollbar-primary::-webkit-scrollbar {
width: 12px;
background-color: #2F4F4F; }

.scrollbar-primary::-webkit-scrollbar-thumb {
border-radius: 10px;
-webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.1);
background-color: #4285F4; }
</style>