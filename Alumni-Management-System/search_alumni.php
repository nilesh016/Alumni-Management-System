<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Search Alumni</title>
    <link rel="stylesheet" href="css/index.css" />
</head>

<body>
    <?php
    include_once "setting/search_navigation.php";
    include_once "connect_database.php";
    ?>

    <style>
        .dropbtn {
            background-color: white;
            color: red;
            padding: 5px 116px;
            font-size: 15px;
            border: 2px solid #050119;
            cursor: pointer;
        }

        input.i1 {
            padding: 3px 119px;
            font-size: 20px;
        }
    </style>

    <form action="search_result.php" method="post">
        <center><p style="font-size: 25px;">Search via any one of the following:</p></center>
        <table width="710" align="center" style="border:2px hidden;" cellspacing="20">
            <tr>
                <th align="left" width="450" style="border:hidden;font-size:18px">Name</th>
                <td width="450" style="border:hidden"><input size="45" type="text" name="pid" /></td>
            </tr>
            <tr>
                <td colspan="2" align="center" style="border:hidden;font-size:15px">OR</td>
            </tr>
            <tr>
                <th align="left" width="450" style="border:hidden;font-size:18px">Registration Number</th>
                <td width="450" style="border:hidden"><input size="45" type="text" name="aid" /></td>
            </tr>
            <tr>
                <td colspan="2" align="center" style="border:hidden;font-size:15px">OR</td>
            </tr>
            <tr>
                <th align="left" width="450" style="border:hidden;font-size:18px">Branch</th>
                <td width="450" style="border:hidden">
                    <select class="dropbtn" name="pp">
                        <option value="">Select Branch</option>
                        <option value="CSE">CSE</option>
                        <option value="ECE">ECE</option>
                        <option value="EE">EE</option>
                        <option value="AIEI">AIEI</option>
                        <option value="FOOD">FOOD</option>
                        <option value="MECH">MECH</option>
                        <option value="IT">IT</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td colspan="2" align="center" style="border:hidden;font-size:15px">OR</td>
            </tr>
            <tr>
                <th align="left" width="450" style="border:hidden;font-size:18px">Session</th>
                <td width="450" style="border:hidden">
                    <select class="dropbtn" name="sp">
                        <option value="">Select Session</option>
                        <option value="2005-2009">2005-2009</option>
                        <option value="2006-2010">2006-2010</option>
                        <option value="2007-2011">2007-2011</option>
                        <option value="2008-2012">2008-2012</option>
                        <option value="2009-2013">2009-2013</option>
                        <option value="2010-2014">2010-2014</option>
                        <option value="2011-2015">2011-2015</option>
                        <option value="2012-2016">2012-2016</option>
                        <option value="2013-2017">2013-2017</option>
                        <option value="2014-2018">2014-2018</option>
                        <option value="2015-2019">2015-2019</option>
                        <option value="2016-2020">2016-2020</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td colspan="2" align="center" style="border:hidden">
                    <button type="submit" name="search_alumni">Submit</button>
                </td>
            </tr>
        </table>
    </form>
</body>
</html>
