<?php

    function main(){

        require_once('header.php');

        $con = connect();
        ($stmt = $con->prepare('SELECT id FROM shows WHERE title LIKE \'%?%\''))
        || fail('MySQL prepare', $con->error);
        $stmt->bind_param('s',$_POST['title'])
        || fail('MySQL bind_param', $con->error);
        $stmt->execute()
        || fail('MySQL execute', $con->error);
        $stmt->bind_result($id)
        || fail('MySQL execute', $con->error);
        while($stmt->fetch()){} //while b/c idk why it just needs it
        $con->close();
        $stmt->close();
        Redirect('http:\\\\clubs.uci.edu/cae/home.php?p=shows&n='.$id);

    }

    main()

?>
