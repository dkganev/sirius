<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\ScheduleList;

class Schedule  extends AbstractController {

    
    
    public function Index(): Response{
        $data['request'] = $_GET;
        $curentDay = date('Y-m-d');
        if (empty($data['request']['month'])){
            $curentMonth = date('m');
            $curentMonthF = date('F');
            $curentYear  = date('Y');
        }
        else{
            $curentMonth = date('m', strtotime($data['request']['month']));
            $curentMonthF = date('F', strtotime($data['request']['month']));
            $curentYear  = date('Y', strtotime($data['request']['month']));
        }
        
        
        $theMonth = $curentMonth;
        $theMonthF = $curentMonthF;
        $theYear = $curentYear;
        $daysInMounth = cal_days_in_month(CAL_GREGORIAN,intval(date('m', strtotime($theMonthF))), intval(date('Y', strtotime($theYear))));
        $firstDayOfMonth = date('Y-m-d', strtotime("$theYear-$theMonth-01"));
        $firstDayOfNextMonth = date('Y-m-d', strtotime("+1 Months",strtotime($firstDayOfMonth)));
        $firstDayOfPrevMonth = date('Y-m-d', strtotime("-1 Months",strtotime($firstDayOfMonth)));
        
        $firstDayOfMonthWeek = date('N', strtotime("$theYear-$theMonth-01"));
        
        $dayOfWeek = $firstDayOfMonthWeek;
        $dayOfMonth = $firstDayOfMonth;
        
        
        if (strtotime($dayOfMonth)<= strtotime($curentDay)){
            $monthThitle = [
                ['title' => '', 'onClick' => "#", 'color' => 'black'],
                ['title' => $theMonthF, 'onClick' => $firstDayOfNextMonth, 'color' => 'black'],
                ['title' => '', 'onClick' => "Schedule?month=$firstDayOfNextMonth", 'color' => 'black'],
            ];
        }
        else{
            $monthThitle = [
                ['title' => '', 'onClick' => "Schedule?month=$firstDayOfPrevMonth", 'color' => 'black'],
                ['title' => $theMonthF, 'onClick' => $firstDayOfNextMonth, 'color' => 'black'],
                ['title' => '', 'onClick' => "Schedule?month=$firstDayOfNextMonth", 'color' => 'black'],
            ];
        }
        
        //Table header
        $monthHeder = [
            1 => ['title' => 'Monday', 'color' => 'black'],   
            2 => ['title' => 'Tuesday', 'color' => 'black' ],   
            3 => ['title' => 'Wednesday', 'color' => 'black'],   
            4 => ['title' => 'Thursday', 'color' => 'black'],   
            5 => ['title' => 'Friday', 'color' => 'black'],   
            6 => ['title' => 'Saturday', 'color' => 'red'],   
            7 => ['title' => 'Sunday', 'color' => 'red'],   
        ];
        
        //Еmpty cells on first Row of month
        $daysOfMonth[0] = array();
        $w = 1;  
        for ($i = 1; $i < $firstDayOfMonthWeek ; $i++){
            $daysOfMonth[$w][$i] = [
                'title' => '', 
                'onDay' => 0,
                'onMonth' => 0,
                'onYear' => 0, 
                'onclick' => '', 
                'backgroundColor' => '',
                'color' => ''
            ];
        }
        
        //Day Rows of month
        for ($i = $dayOfWeek; $i <= $dayOfWeek + $daysInMounth - 1; $i++){
            
            if (in_array($i, [6,7,13,14,20,21,27,28,34,35] ) ){
                if (strtotime($dayOfMonth)<= strtotime($curentDay)){
                    $daysOfMonth[$w][$i] = [
                        'title' => $dayOfMonth, 
                        'onDay' => -1,
                        'onMonth' => $i,
                        'onYear' => 0,
                        'onclick' => '', 
                        'backgroundColor' => '',
                        'color' => 'grey'
                    ];
                }
                else{
                    $daysOfMonth[$w][$i] = [
                        'title' => $dayOfMonth, 
                        'onDay' => 0,
                        'onMonth' => $i,
                        'onYear' => 0,
                        'onclick' => '', 
                        'backgroundColor' => '',
                        'color' => 'red'
                    ];
                }
            }
            else{
                if (strtotime($dayOfMonth)< strtotime($curentDay)){
                    $daysOfMonth[$w][$i] = [
                        'title' => $dayOfMonth, 
                        'onDay' => '-1', //date('d', strtotime($dayOfMonth)),
                        'onMonth' => $theMonth,
                        'onYear' => $theYear,
                        'onclick' => $dayOfMonth,
                        'backgroundColor' => '',
                        'color' => 'grey'
                    ];
                }
                else if (strtotime($dayOfMonth)== strtotime($curentDay)){
                    $daysOfMonth[$w][$i] = [
                        'title' => $dayOfMonth, 
                        'onDay' => date('d', strtotime($dayOfMonth)),
                        'onMonth' => $theMonth,
                        'onYear' => $theYear,
                        'onclick' => $dayOfMonth,
                        'backgroundColor' => 'background-color: #DCDCDC',
                        'color' => 'white'
                    ];
                }
                else{
                    
                    $daysOfMonth[$w][$i] = [
                        'title' => $dayOfMonth, 
                        'onDay' => date('d', strtotime($dayOfMonth)),
                        'onMonth' => $theMonth,
                        'onYear' => $theYear,
                        'onclick' => $dayOfMonth,
                        'backgroundColor' => '',
                        'color' => 'black'
                    ];
                }
            }
            
            $dayOfMonth = date('Y-m-d', strtotime("+1 days", strtotime($dayOfMonth)));
            if (in_array($i, [7,14,21,28,35] ) ){
                $w++;
            }
            
        }
        
        $scheduleStart = 9;
        $scheduleStop = 21;
        for ($i = $scheduleStart; $i <= $scheduleStop; $i++ ){
            $scheduleOfDay[$i][1] = [
                'title' => "$i : 00 - $i : 30", 
                'id' => $i . '00-' . $i .'30' 
            ];
            $scheduleOfDay[$i][2] = [
                'title' => "$i : 30 - " . ($i + 1) . " : 00",
                'id' => $i . '30-' . ($i + 1) . ':00' 
            ];
        }

        return $this->render('Sirius/layoutSirius.html.twig', [
            'container' => "Sirius/containerMonth.html.twig", 
            'monthThitle' => $monthThitle, 
            'monthHeder' => $monthHeder, 
            'scheduleOfDay' => $scheduleOfDay, 
            'daysOfMonth' => $daysOfMonth  
        ]);
    }
    

    public function openDayModal(Request $request): Response {
        $data['request'] = $_POST;
        $data['query'] = $this->getDoctrine()->getRepository(ScheduleList::class)->
                getEventsForDay(
                        $data['request']["onYear"],
                        $data['request']["onDay"],
                        $data['request']["onMonth"]
                );
                
        $data['success'] = 1;
        return $this->json($data);
    }
    
    public function saveAppointmentForm(Request $request): Response {
        $data['request'] = $_POST['formData'];
        
        $data['query'] = $this->getDoctrine()->getRepository(ScheduleList::class)->saveAppointmentForm($data['request']);
        if ($data['query']){
            $data['success'] = 1;
        }
        else{
            $data['success'] = 0;
        }
        
        return $this->json($data);
    }
    
}
