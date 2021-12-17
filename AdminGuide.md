
# AGN LabFinder Admin Guide

#### This is a brief guide to the AGN LabFinder administration interface.

**CLARIFICATION**: The words "instrument", "procedure" and "technique" are equivalent in this document. Instruments, procedures and techniques are all stored as "techniques" in the database.

## How to add a new Technique/Instrument/Procedure

PLEASE NOTE: The data entered in steps 2,3,4,5 are optional, because they may have already been entered for other machines. E.g. your university lab has already been added. In this case they can be copied or re-used for the new technique.

### Step 1: Add an image (if required)

1. Take a picture of the equipment. The picture must be &quot;PNG&quot; or &quot;JPEG&quot;, roughly square, not too large or detailed (typically 300kB in size)
2. In the main admin page, click on &quot;Images and Movies&quot;
3. Click on &quot;New Image&quot;
4. Type in a caption into the &quot;Caption&quot;
5. Select the image by clicking on the &quot;Choose file&quot; button
6. Click &quot;Create&quot;

### Step 2: Add new location (optional)

Is this a new institution? If not, skip this step.

1. In the admin page, click on &quot;Locations&quot;
2. Click on &quot;New Location&quot;
3. Enter in institution name, e.g. &quot;Curtin University&quot;
   
   Select a state
   
   Ignore &quot;Status&quot; field
   
   Enter in full address into the address field
   
   Enter in centre name e.g. &quot;John de Laeter Research Centre&quot;

4. Click &quot;Create&quot;

### Step 3: Add new contact (optional)

This defines the person that manages the laboratory and institution. Skip this step if the person &amp; institution already exists in the database.

1. In the &quot;Admin&quot; page, click on &quot;Contacts&quot;.
2. Click on &quot;Add Contact&quot;
3. Enter in &quot;Ms&quot;, &quot;Dr&quot; etc into title field

   Enter in full name e.g. &quot;Jane Smith&quot;

   Enter in position e.g. &quot;Lab Manager&quot;

   Enter in telephone, email
   
   IMPORTANT: Set technique contact to &quot;Yes&quot;

   Select same location as defined in previous step

4. Click &quot;Create&quot;

### Step 4: Add metadata (optional)

This defines the TYPE of technique/instrument/procedure as used in the &quot;Geochemical Analysis Choices&quot; and/or if it is used for &quot;Sample Preparation&quot; and/or &quot;Experimental Procedure&quot;. This step is only required if the technique&#39;s metadata category has not been defined yet.

This table is a summary:

| **Type of lab technique** | **Choice of Category Type** | **Choice of Analysis Type** |
| --- | --- | --- |
| Geochemical Analysis Choices | &lt;any&gt; (Appears in "Step 1" choices) | &lt;any&gt; (Appears in &quot;Step 2&quot; choices) | 
| Experimental Procedure | Experimental Instrument | Not Applicable |
| Sample Preparation | Sample Preparation | Not Applicable |

1. In the &quot;Admin&quot; page, click on &quot;Metadata&quot;
2. Click on &quot;New Metadata&quot;
3. Define your metadata record.

   (i) Enter in the &quot;Category&quot; field – this is the broad type of machine/technique used e.g. &quot;Diamond Saws&quot;, &quot;ICP-MS&quot;, &quot;Magnetic Separation&quot;

   (ii) Select in the &quot;Category Type&quot;. For &quot;Sample Preparation&quot; or &quot;Experimental Instruments&quot; just pick &quot;Sample Preparation&quot; or &quot;Experimental Instrument&quot;. 
   
   Note if you choose &quot;Age Determination&quot; or &quot;Elemental Composition&quot; or &quot;Isotopic Analysis&quot; the associated technique will be displayed in the &quot;Geochemical Analysis and Age Determination&quot; section.

   (iii) Select the &quot;Analysis Type&quot;. This is really only used by instruments which will be displayed in the &quot;Geochemical Analysis&quot; section. Therefore, if you chose &quot;Age Determination&quot; or &quot;Elemental Composition&quot; or &quot;Isotopic Analysis&quot; in (ii), then you should choose &quot;Spot Analysis&quot; or &quot;Whole Rock or Mineral Separates&quot; or &quot;Both&quot;. Otherwise just choose &quot;Not Applicable&quot;.

### Step 5: Add elements (optional)

This is only required if the technique has a fixed set of elements that it can detect (e.g. mass spectrometers), and this set of elements has not yet been defined.

1. In the &quot;Admin&quot; page, click on &quot;Elements&quot;
2. Click on &quot;New Elements&quot;
3. Enter in a name for the new set of elements.
   Select elements by clicking on tickboxes as required
   Click &quot;Create&quot;

### Step 6: Add technique (instrument/procedure)

1. In the &quot;Admin&quot; page, click on &quot;Techniques&quot;
2. Click on &quot;New Technique&quot;
3. Fields with asterisk (\*) are compulsory

   Enter in &quot;Name\*&quot;, &quot;Alternative Name&quot;, &quot;Instrument Name\*&quot;, &quot;Model\*&quot;, &quot;Manufacturer\*&quot;, &quot;Sample Type&quot;, &quot;Wavelength&quot;, &quot;Beam Diameter&quot;, &quot;Minimum Conc.&quot;, &quot;Mass&quot;, &quot;Volume&quot;, &quot;Pressure&quot;, &quot;Temperature&quot; as best describes by the instrument&#39;s capabilities.

   &quot;Summary\*&quot; field should be a BRIEF one line description of the technique
   
   &quot;Long Description\*&quot; is the final &quot;landing page&quot; after the &quot;Geochemical Analysis and Age Determination&quot; section of the website.

   &quot;Keywords&quot; is used in the search function

   &quot;Media Examples&quot; is used to select the photo entered in Step 1

   &quot;Contacts&quot; is used to select the contact entered in Step 3

   NB: &quot;Machine Localisation&quot; is seldom used. It can be used to copy an existing machine localisation. Only use this if you have duplicate machines - two identical machines installed in the same year in the same laboratory. Normally machine localisation would be added in the next step.

   Select &quot;Metadata&quot; and click &quot;Add Metadata&quot;. Add in metadata from Step 4. You can add more than one row of metadata to a technique. If you add in one row of metadata, that option is automatically selected as representing this technique/instrument in "Geochem Analysis Choices" section. If you add more than one row of metadata, you can choose which metadata row you want to represent this technique/instrument by clicking on the radio buttons in the "Geochem Analysis Choices" column. Only one metadata row can be referenced in "Geochem Analysis Choices". 

   If the machine has a list of detected elements (from Step 5), select them.

   Click &quot;Create&quot;.


### Step 7: Add new localisation

This defines the particular instrument/technique details

1. In the &quot;Admin&quot; page, click on &quot;Localisation&quot;.
2. Click on &quot;Add Localisation&quot;

   Enter in a four digit "Year Commissioned".

   Select an application, click on "Add Applications" to add it. You can add as many applications as you like.
   
   Select a location.

   Select the technique added in the previous step.



## Changing Titles and Short Phrases in Web Pages

In the Admin Page the &quot;Static Content&quot; sub menu allows you to edit the titles and certain short phrases. A table is displayed with the left hand column describing the location and purpose of the text.

## Advice about using the HTML Editor

Some fields use the [HTML](https://en.wikipedia.org/wiki/HTML) editor, i.e. in "Static Content" section and "Summary" and "Description" in "Techniques" section. 

It uses HTML markup to format the text. HTML markup is represented by text in angle brackets e.g. &lt;div&gt;

Please note that many of the fields in "Static Content" and the "Summary" field will display correctly *only* when displayed with minimal HTML markup.

This means just "&lt;p&gt;" and "&lt;\p&gt;"

e.g. &lt;p&gt;Search for your choice here.&lt;\p&gt; 

To use minimise the HTML markup, enter in your text with the "Source" button enabled (click on "Source" in top LH corner).

With the "Description" fields it is expected that HTML will be in full use, so the "Source" button can be disabled.

## Changing a Technique&#39;s text and images: which fields to edit in the Admin Pages

This section is a map from the text and images you see in the public web pages to the fields that can be modified in the admin pages.

### Option 1: Choose your research interest

#### Geochemical Analysis and Age Determination

| **Web Page Element** | **Admin Submenu** | **Field** | **Notes** |
| --- | --- | --- | --- |
| Text in boxes under "Step 1: Choose a research interest" | Technique | Geochem Analysis Choices | See "Step 4" in "How to add a new Technique" |
| Text in boxes under "Step 2: Type of analysis" | Technique | Geochem Analysis Choices | See "Step 4" in "How to add a new Technique" |
| Cards header | Metadata | Category | |
| Cards body | Technique | Model | |
| Cards mouseover text | Technique | Name, Summary | The mouseover text has the technique id displayed so it is easy to locate which technique to edit |

#### Geochemical Analysis and Age Determination Landing Page

| **Web Page Element** | **Admin Submenu** | **Field** | **Notes** |
| --- | --- | --- | --- |
| Final cards landing page | Technique | Description | The landing page has the technique id in the URL e.g. "https://labfinder.geoanalytics.group/Portal/viewGeochemAnalysis/16" has technique id of 16. This can be used to locate the correct technique to edit. |

#### Experimental Procedure

| **Web Page Element** | **Admin Submenu** | **Field** |
| --- | --- | --- |
| Cards header | Metadata | Category |
| Cards body | Technique | \* |

#### Experimental Procedure Details Page

| **Web Page Element** | **Admin Submenu** | **Field** |
| --- | --- | --- |
| Cards header | Locations | Center Name &amp; Institution |
| Cards &quot;Applications&quot; &amp; &quot;Year Commissioned&quot; attributes | Localisation | Applications &amp; Year Commissioned |
| Cards other attributes | Locations | \* |
| Cards tables &quot;analysis type&quot; | Metadata | Analysis type |
| Cards tables | Technique | \* |

NOTE: The details page has the technique id in the URL e.g. "https://labfinder.geoanalytics.group/Portal/viewTechnique/41" has technique id of 41.
This can be used to locate the correct technique to edit.

#### Sample Preparation

| **Web Page Element** | **Admin Submenu** | **Field** |
| --- | --- | --- |
| Text box header | Technique | Name |
| Text box attributes | Technique | \* |
| Pictures | Images and Movies | \* |

### Option 2: Search by keyword

#### Search List Results

| **Web Page Element** | **Admin Submenu** | **Field** |
| --- | --- | --- |
| Title | Technique | Name |
| Text | Technique | Summary |
| Image | Images and Movies | \* |

#### Cards Page

| **Web Page Element** | **Admin Submenu** | **Field** |
| --- | --- | --- |
| Cards header | Locations | Center Name &amp; Institution |
| Cards &quot;Applications&quot; &amp; &quot;Year Commissioned&quot; attributes | Localisation | Applications &amp; Year Commissioned |
| Cards other attributes | Locations | \* |
| Cards tables &quot;analysis type&quot; | Metadata | Analysis type |
| Cards tables | Technique | \* |

NOTE: The cards page has the technique id in the URL e.g. "https://labfinder.geoanalytics.group/Portal/viewTechnique/41" has technique id of 41.
This can be used to locate the correct technique to edit.

### Option 3: View list of available techniques

#### List Page

| **Web Page Element** | **Admin Submenu** | **Field** |
| --- | --- | --- |
| Instrument Type | Technique | Instrument Name |
| Model | Technique | Model |
| Manufacturer | Technique | Manufacturer |

#### Cards Page

| **Web Page Element** | **Admin Submenu** | **Field** |
| --- | --- | --- |
| Cards header | Locations | Center Name &amp; Institution |
| Cards &quot;Applications&quot; &amp; &quot;Year Commissioned&quot; attributes | Localisation | Applications &amp; Year Commissioned |
| Cards other attributes | Locations | \* |
| Cards table &quot;analysis type&quot; | Metadata | Analysis type |
| Cards table | Technique | \* |

NOTE: The cards page has the technique id in the URL e.g. "https://labfinder.geoanalytics.group/Portal/viewTechnique/41" has technique id of 41.
This can be used to locate the correct technique to edit.

## Search Function

The search function uses the MySQL &quot;MATCHES&quot; search in &quot;NATURAL LANGUAGE&quot; mode.

If there are multiple words e.g. &quot;Scanning Raman&quot;, then it will should return records with &quot;Scanning&quot; and records with &quot;Raman&quot;, but if any records have both, then they are ranked higher and will come higher up in the search results list.

Two or three letter word searches (e.g. chemical element symbol names like 'Pt') are not currently supported.

More info: https://database.guide/how-the-match-function-works-in-mysql/

The search function does a search of the following fields:

| **Admin Sub-Menu** | **Field** |
| --- | --- |
| Techniques | Name, Instrument Name, Model, Manufacturer, Sample Type, Alternative Names, Summary, Description, Keywords |
| Locations | Institution, Center Name, Address, State |
| Techniques | &quot;Category&quot; in Geochem Analysis Choices |
| Metadata | Category |
| Images and Movies | Caption |
| Elements | Name, Symbol |

