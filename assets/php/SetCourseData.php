<?php
    include"Connection.php";
   
?>
<?php
    $course = $_COOKIE['course'];
    $Netspeed = $_COOKIE['speed'];
    $accuracy = $_COOKIE['accuracy'];
    $userId = $_SESSION['UserID'];
    
    if($_SESSION['UserID'])
    {
        
        $query = "select courseID, SpeedInCourse, AccuracyInCourse from `userstatus` where UserID = $userId ";
        $result = $conn->query($query);
        if($result)
        {
            if($row = $result->fetch_assoc())
            {
                if($row["courseID"] == "")
                {
                    $query = "update `userstatus` set courseID = '$course', SpeedInCourse='$Netspeed', AccuracyInCourse ='$accuracy'  where UserID = $userId ";
                    $result = $conn->query($query);
                    if($result)
                    {
                        echo"Success";
                    }
                    else
                    {
                        echo"UpdateError".$query;
                    }
                }
                else
                {
                    $CourseData = $row["courseID"];
                    $SpeedInCourseData = "";
                    $AccuracyInCourseData = "";
                    $CourseComplition = explode(',',$row["courseID"]);
                    $CourseSpeed = explode(',',$row["SpeedInCourse"]);
                    $CourseAccuracy = explode(',',$row["AccuracyInCourse"]);
                    $flag = 0;
                    $i = 0;
                    foreach($CourseComplition as $crs)
                    {
                        if($crs == $course)
                        {
                            $CourseSpeed[$i] = $Netspeed;
                            $CourseAccuracy[$i] =$accuracy;
                            $flag =1;
                        }
                        $SpeedInCourseData.=$CourseSpeed[$i].",";
                        $AccuracyInCourseData.= $CourseAccuracy[$i].",";
                        $i++;
                    }
                    if($flag == 0)
                    {
                        $CourseData .= ",".$course;
                        $SpeedInCourseData.=$Netspeed;
                        $AccuracyInCourseData.=$accuracy;
                    }
                    $query = "update `userstatus` set courseID = '$CourseData', SpeedInCourse = '$SpeedInCourseData', AccuracyInCourse = '$AccuracyInCourseData' where UserID = $userId ";
                    $result = $conn->query($query);
                    if($result)
                    {
                        echo"Success";
                    }
                    else
                    {
                        echo"UpdationError";
                    }
                }
            }
            else
            {
                echo"fachError";
            }
        }
        else
        {
            echo"UserIDError";
        }
    }
    else
    {
        echo "NOSession";
    }
?>