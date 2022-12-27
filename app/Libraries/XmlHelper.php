<?php

namespace App\Libraries;
use Mtownsend\XmlToArray\XmlToArray;

class XmlHelper
{

   public static function xml()
   {
      $xml = <<<XML
      <?xml version="1.0" encoding="UTF-8"?>
      <HotelListing>
          <HotelCode Currency="INR">1000000681</HotelCode>
          <RoomList>
              <Room>
                  <RoomTypeName>Deluxe Cottage AC</RoomTypeName>
                  <RoomTypeCode>45000001713</RoomTypeCode>
                  <IsActive>True</IsActive>
              </Room>
              <Room>
                  <RoomTypeName>Den Cottage AC</RoomTypeName>
                  <RoomTypeCode>45000001714</RoomTypeCode>
                  <IsActive>True</IsActive>
              </Room>
              <Room>
                  <RoomTypeName>Premium Cottage AC</RoomTypeName>
                  <RoomTypeCode>45000001715</RoomTypeCode>
                  <IsActive>True</IsActive>
              </Room>
              <Room>
                  <RoomTypeName>Couple Package  Deluxe Non AC</RoomTypeName>
                  <RoomTypeCode>45000012484</RoomTypeCode>
                  <IsActive>False</IsActive>
              </Room>
              <Room>
                  <RoomTypeName>Couple Package for Den AC Room</RoomTypeName>
                  <RoomTypeCode>45000012503</RoomTypeCode>
                  <IsActive>False</IsActive>
              </Room>
              <Room>
                  <RoomTypeName>Couple Package for PREMIUM AC </RoomTypeName>
                  <RoomTypeCode>45000012507</RoomTypeCode>
                  <IsActive>False</IsActive>
              </Room>
          </RoomList>
          <RatePlanList>
              <RatePlan IsEditable="True">
                  <RoomTypeName>Deluxe Cottage AC</RoomTypeName>
                  <RoomTypeCode>45000001713</RoomTypeCode>
                  <IsActive>True</IsActive>
                  <RatePlanCode>990000001857</RatePlanCode>
                  <RatePlanName>APAI</RatePlanName>
                  <MealPlan>FREE Breakfast, Lunch and Dinner</MealPlan>
                  <LinkedRatePlan IsLinked="False"/>
              </RatePlan>
              <RatePlan IsEditable="True">
                  <RoomTypeName>Deluxe Cottage AC</RoomTypeName>
                  <RoomTypeCode>45000001713</RoomTypeCode>
                  <IsActive>True</IsActive>
                  <RatePlanCode>990000012282</RatePlanCode>
                  <RatePlanName>CPAI</RatePlanName>
                  <MealPlan>FREE Breakfast</MealPlan>
                  <LinkedRatePlan IsLinked="False"/>
              </RatePlan>
              <RatePlan IsEditable="True">
                  <RoomTypeName>Deluxe Cottage AC</RoomTypeName>
                  <RoomTypeCode>45000001713</RoomTypeCode>
                  <IsActive>True</IsActive>
                  <RatePlanCode>990000044053</RatePlanCode>
                  <RatePlanName>MAPAI</RatePlanName>
                  <MealPlan>FREE Breakfast and Dinner</MealPlan>
                  <LinkedRatePlan IsLinked="False"/>
              </RatePlan>
              <RatePlan IsEditable="True">
                  <RoomTypeName>Den Cottage AC</RoomTypeName>
                  <RoomTypeCode>45000001714</RoomTypeCode>
                  <IsActive>True</IsActive>
                  <RatePlanCode>990000001858</RatePlanCode>
                  <RatePlanName>APAI</RatePlanName>
                  <MealPlan>FREE Breakfast, Lunch and Dinner</MealPlan>
                  <LinkedRatePlan IsLinked="False"/>
              </RatePlan>
              <RatePlan IsEditable="True">
                  <RoomTypeName>Den Cottage AC</RoomTypeName>
                  <RoomTypeCode>45000001714</RoomTypeCode>
                  <IsActive>True</IsActive>
                  <RatePlanCode>990000012283</RatePlanCode>
                  <RatePlanName>CPAI</RatePlanName>
                  <MealPlan>FREE Breakfast</MealPlan>
                  <LinkedRatePlan IsLinked="False"/>
              </RatePlan>
              <RatePlan IsEditable="True">
                  <RoomTypeName>Den Cottage AC</RoomTypeName>
                  <RoomTypeCode>45000001714</RoomTypeCode>
                  <IsActive>True</IsActive>
                  <RatePlanCode>990000044054</RatePlanCode>
                  <RatePlanName>MAPAI</RatePlanName>
                  <MealPlan>FREE Breakfast and Dinner</MealPlan>
                  <LinkedRatePlan IsLinked="False"/>
              </RatePlan>
              <RatePlan IsEditable="True">
                  <RoomTypeName>Premium Cottage AC</RoomTypeName>
                  <RoomTypeCode>45000001715</RoomTypeCode>
                  <IsActive>True</IsActive>
                  <RatePlanCode>990000001859</RatePlanCode>
                  <RatePlanName>APAI</RatePlanName>
                  <MealPlan>FREE Breakfast, Lunch and Dinner</MealPlan>
                  <LinkedRatePlan IsLinked="False"/>
              </RatePlan>
              <RatePlan IsEditable="True">
                  <RoomTypeName>Premium Cottage AC</RoomTypeName>
                  <RoomTypeCode>45000001715</RoomTypeCode>
                  <IsActive>True</IsActive>
                  <RatePlanCode>990000012284</RatePlanCode>
                  <RatePlanName>CPAI</RatePlanName>
                  <MealPlan>FREE Breakfast</MealPlan>
                  <LinkedRatePlan IsLinked="False"/>
              </RatePlan>
              <RatePlan IsEditable="True">
                  <RoomTypeName>Premium Cottage AC</RoomTypeName>
                  <RoomTypeCode>45000001715</RoomTypeCode>
                  <IsActive>True</IsActive>
                  <RatePlanCode>990000044055</RatePlanCode>
                  <RatePlanName>MAPAI </RatePlanName>
                  <MealPlan>FREE Breakfast and Dinner</MealPlan>
                  <LinkedRatePlan IsLinked="False"/>
              </RatePlan>
          </RatePlanList>
      </HotelListing>
      XML;
      //   return $xml;
   }
}
