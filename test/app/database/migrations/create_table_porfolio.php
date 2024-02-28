<?php
//Creación tabla porfolio
function create_table_portfolio($con)
{
    $strSQL = "CREATE TABLE IF NOT EXISTS portfolio (
    pk_portfolio INT PRIMARY KEY AUTO_INCREMENT,
    fk_por_user INT,
    por_datos INT,
    FOREIGN KEY (fk_por_user) REFERENCES user(pk_user) ON DELETE CASCADE);";

    mysqli_query($con, $strSQL);
}
