<?php
class Model {
    public function getlogin(){
        $query = "SELECT * FROM users";
        $response = $bdd -> prepare($query);
        $response->execute();
        $datas = $response->fetchAll();

        // here goes some hardcoded values to simulate the database
        if(isset($_REQUEST['username']) && isset($_REQUEST['password'])){
            if($_REQUEST['username']==  && $_REQUEST['password']=='admin'){
                return 'login';
            }
            else{
                return 'invalid user';
            }
}
}
}
?>