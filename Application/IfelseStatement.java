/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package homework1;
import java.util.*;

/**
 *
 * @author Gino
 */
public class IfelseStatement {
    static Scanner console = new Scanner (System.in);
    public static void main (String [] args){
        double hours, rate, ot, nt, otp, ntp;
        
        System.out.println("Number of Hours: ");
        hours = console.nextDouble();
        ot = (hours - 40);
        nt = (hours - ot);
        otp = (ot * (35 * 1.5));
        ntp = (nt * 35);
        
        if (hours <= 40){
            rate = (hours * 35);
        System.out.println("Employee's Normal Pay is: Php " +rate);
        System.out.println("Employee's Overtime Pay is: Php 0.00");
        System.out.println("Employee's Total Salary: Php " +rate);
        }else{
         
         rate = (otp + ntp);
        System.out.println("Employee's Normal Pay is: Php" +ntp);
        System.out.println("Employee's Overtime Pay is: Php" +otp);
        System.out.println("Employee's Total Salary is: Php" + rate);
        }
    }
}
