<?php            
function showTopParty(){

        if($sunny){

            $db=new SQLITE3("./db/sqlite.db");
            $sql = "SELECT rating from ratings where enviroment = outside and category = party
            order by rating desc
            LIMIT 1";
            $stmnt = $db->prepare($sql);
            $stmnt->bindParam(':tid', $tid, SQLITE3_TEXT);
            
            $result = $stmnt->execute();
            while($row=$result->fetchArray()) {
        
        
        
            }
        
        }else($rainy){   
            $db= new SQLITE3("./db/sqlite.db");
            $sql = "SELECT rating from ratings where enviroment = inside and category = party
            order by rating desc
            LIMIT 1";
            $stmnt = $db->prepare($sql);
            $stmnt->bindParam('??', ??, SQLITE3_TEXT);
        
            $result = $stmnt->execute();
            while($row=$result->fetchArray()){
            
        
        }elseif{
            
                
            $db=new SQLITE3("./db/sqlite.db");
            $sql = "SELECT threadText from threads
            order by rating desc
            LIMIT 1";
            $stmnt = $db->prepare($sql);
            $stmnt->bindParam('??', ??, SQLITE3_TEXT);
            
            $result = $stmnt->execute();
            while($row=$result->fetchArray()) {
        
        
            }
    }
    
?>