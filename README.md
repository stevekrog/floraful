# floraful
![] (http://i.imgur.com/T53VVw8.png)

##floraful is a web application to allow users to input plant observations and to provide output reports of the observed data

###README Contents
- [Input Users](#a1)
- [Output Clients](#a2)
- [Input](#a3)
- [Output](#a4)
- [Validation](#a5)
- [Desired Optional Features](#a6)
- [Newly Added Requested Features (Optional)](#a7)
- [Questions](#a8)

<a name="a1"/>
**Input Users**: Field users who make observations and input them into app

<a name="a2"/>
**Output Clients**: CREW - Custodians of Rare and Endangered Wildflowers. They will need access to the observations from both a web page and downloadable reports.

<a name="a3"/>
**The application should capture the following plant information**

Input field name | type | how derived | sample values
-------------------- | ---- | ----------- |----------------
Unique Record Id | int | system generated | 1
Observer Name | text | user entered | Ivan Kong
Current DateTime| Datetime | system generated | 10/27/2015
Plant Name | text | user entered | Protea repens
Soil conditions | text | user entered | grey loam
Weather Description | text | user entered or api | sunny with a hint of Fall in the air
Temperature (F)| decimal | user entered or api | 67.1
Low Temperature (F)| decimal | user entered or api | 48.6
High Temperature (F)| decimal | user entered or api | 68.2
Location Description | text | user entered | 2.6 miles SSE of Avon CO
Latitude | decimal(9,6) | api or user entered | 41.947372
Longitude | decimal(9,6) | api or user entered | -104.655788
Notes | text | user entered | description of locality and / or vegetation

<a name="a4"/>
**Output**:
Web page that allows administrators to view input records in chronological order. Allow the administrators to download a report in simple format, such as csv file.

<a name="a5"/>
**Validation**:
* All user entered fields
    * Search for invalid characters using regex and other php functions. If found return error and clear incorrect field(s).
* One plant name per record
* Fields where user entered value is preferred over api value
    * Weather Description
* Fields where api value is preferred over user entered value
    * Latitude
    * Longitude
* Validate that lat long are in the correct format and in range.    

<a name="a6"/>
**Optional Features (nice to have if possible)**:
* access weather api to gather weather conditions when observation is taken.
* access geocoding api to get latitude and longitude of location when observation is taken.

<a name="a7"/>
**Additional Requested Features (Optional)**:
1. Login Framework - Add ability for users to create an account and then login prior to submitting form.   This allows an admin to filter and sort the data by user.  
    - Users can add themselves.  
    - There will be a new user form.  
    - Users will be uniquely identified by email and therefore a new user form submission cannot create another user with the same email address.  
    - Optionally, a user can view (not edit) all prior submissions.  
    - Only an administrator has privileges to edit existing data.  

2. Still allow users who don't want to login to enter data quickly as a guest user.

3. Collect Animal Data - Additional specialized fields for animal data collection
    - Instead of tracking all animal species, let's start with birds.  I found a good resource for how birds are tracked.  See this .pdf on page 9 outlines some bird data that would need be collected <http://rmbo.org/v3/Portals/5/Protocols/2015_Data_Entry_Protocol.pdf>

    - Location and weather data should still be recorded as is done for the plants.

    - Bird specific data is the following:
        - Species
        - Distance from bird (how far away were you when you observed the bird)
        - How was the bird detected (flyover, singing, other)
        - Sex (male, female, unknown)
        - Migrant?
        - Nest observed?
        - Number of eggs in nest

<a name="a8"/>
**Questions**:
* Morgan made the following requests regarding weather values (if possible)
    1. Save current temp, high, low, description
    2. only 1 source for weather. Either api or user.
    3. Order of precedence for weather information
        1. populate values from api call
        2. However, allow user to override (How?)
* Order of precedence for location
    1. lat / long populated from api call
    2. user entered values for lat / long (handheld gps)
    3. If no lat / long values entered, require user entered location value.
