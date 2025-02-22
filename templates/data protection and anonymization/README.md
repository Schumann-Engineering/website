# Data protection & anonymization

## When is something 'personal data'?

### EU GDPR - General Data Protection Regulation

#### 'personal data' (EU GDPR § 4)

'personal data’ means any information relating to an identified or identifiable natural person (‘data subject’); an identifiable natural person is one who can be identified, directly or indirectly, in particular by reference to an identifier such as a

- name
- an identification number
- location data
- an online identifier
- one or more factors specific to the
  - physical
  - physiological
  - genetic
  - mental
  - economic
  - cultural
  - social identity

#### 'special categories of personal data' (EU GDPR § 9)

1. racial origin
2. ethnic origin
3. political opinions
4. religious beliefs
5. philosophical beliefs
6. trade union membership
7. genetic data
8. biometric data for the purpose of uniquely identifying a natural person
9. health information
10. natural person’s sex life or sexual orientation

> :information_source: **INFO**
>
>'special categories of personal data' only fall under EU GDPR data protection rules IF they are also identifing a data subject or additional data make identification reasonable!
>For example, 'member of the catholic church' (4.) or data recorded by an ECG device (9.) are special categories of personal data but are not automaticaly indentifyable on its own.
>An abnormal ECG recorded from a catholic person in Afganistan, however, is reasonable identifiable, because only 200 / 0.0003% of the population are catholics.

(source: CIA Factbook, 2019)

### US HIPAA - Health Insurance Portability and Accountability Act

#### 'Personally Identifiable Information' (PII) (42 CFR § 164.514(b)(2)(i))

1. (A) Names;
1. (B)  All geographic subdivisions smaller than a State, including street address, city, county, precinct, zip code, and their equivalent geocodes, except for the initial three digits of a zip code if, according to the current publicly available data from the Bureau of the Census:
   1. The geographic unit formed by combining all zip codes with the same three initial digits contains more than 20,000 people; and
   2. The initial three digits of a zip code for all such geographic units containing 20,000 or fewer people is changed to 000.
1. (C)  All elements of dates (except year) for dates directly related to an individual, including birth date, admission date, discharge date, date of death; and all ages over 89 and all elements of dates (including year) indicative of such age, except that such ages and elements may be aggregated into a single category of age 90 or older;
1. (D)  Telephone numbers;
1. (E)  Fax numbers;
1. (F)  Electronic mail addresses;
1. (G)  Social security numbers;
1. (H)  Medical record numbers;
1. (I)  Health plan beneficiary numbers;
1. (J)  Account numbers;
1. (K)  Certificate/license numbers;
1. (L)  Vehicle identifiers and serial numbers, including license plate numbers;
1. (M)  Device identifiers and serial numbers;
1. (N)  Web Universal Resource Locators (URLs);
1. (O)  Internet Protocol (IP) address numbers;
1. (P)  Biometric identifiers, including finger and voice prints;
1. (Q)  Full face photographic images and any comparable images; and
1. (R)  Any other unique identifying number, characteristic, or code, except as permitted by paragraph (c) of this section; and

#### 'Health information' (42 USC § 1320d(4), 45 CFR §160.103)

> The term 'health information' means any information, whether oral or recorded in any form or medium, that-
>
> A.  is created or received by a health care provider, health plan, public health authority, employer, life insurer, school or university, or health care clearinghouse; and
> B. relates to the past, present, or future physical or mental health or condition of an individual, the provision of health care to an individual, or the past, present, or future payment for the provision of health care to an individual.

#### 'Individually identifiable health information' (42 USC § 1320d(6), 45 CFR §160.103)

> 'Individually identifiable health information' is information that is a subset of health information, including demographic information collected from an individual, and:
>
> 1. Is created or received by a health care provider, health plan, employer, or health care clearinghouse; and
> 2. Relates to the past, present, or future physical or mental health or condition of an individual; the provision of health care to an individual; or the past, present, or future payment for the provision of health care to an individual; and
>  i. That identifies the individual; or
>  ii. With respect to which there is a reasonable basis to believe the information can be used to identify the individual.

#### 'Protected Health Information' (PHI) (45 CFR §160.103)

> 'Protected health information' means 'individually identifiable health information':
>
> 1. Except as provided in paragraph (2) of this definition, that is:
>  i. Transmitted by electronic media;
>  ii. Maintained in electronic media; or  
>  iii. Transmitted or maintained in any other form or medium.  
> 2. Protected health information excludes individually identifiable health information:
>  i. In education records covered by the Family Educational Rights and Privacy Act, as amended, 20 U.S.C. 1232g;
>  ii. In records described at 20 U.S.C. 1232g(a)(4)(B)(iv);
>  iii. In employment records held by a covered entity in its role as employer; and
>  iv. Regarding a person who has been deceased for more than 50 years.

### FR CNIL

<table>
  <colgroup>
      <col style="width: 50%;" />
      <col style="width: 50%;" />
  </colgroup>
  <tbody>
    <tr>
      <th>Personal data types</th>
      <th>Personal data categories</th>
    </tr>
    <tr>
      <td rowspan="6">Common personal data</td>
      <td>Civil status, identity, identification data</td>
    </tr>
    <tr>
      <td>Personal life (living habits, marital status, etc. –excluding sensitive or dangerous data)</td>
    </tr>
    <tr>
      <td>Professional life (résumé, education and professional training, awards, etc.)</td>
    </tr>
    <tr>
      <td>Economic and financial information (income, financial situation, tax situation, etc.)</td>
    </tr>
    <tr>
      <td>Connection data (IP addresses, event logs, etc.)</td>
    </tr>
    <tr>
      <td>Location data (travels, GPS data, GSM data, etc.)</td>
    </tr>
    <tr>
      <td rowspan="3">Personal data perceived as sensitive</td>
      <td>Social security number</td>
    </tr>
    <tr>
      <td>Biometric data</td>
    </tr>
    <tr>
      <td>Bank data</td>
    </tr>
  </tbody>
</table>

(source: 'Guidelines - Privacy Impact Assessment (PIA) 3: Knowledge Bases', CNIL, 2018-02)

### ISO/IEC 29100:2011 - Information technology — Security techniques — Privacy framework

#### Examples

- Age or special needs of vulnerable natural persons
- Allegations of criminal conduct
- Any information collected during health services
- Bank account or credit card number
- Biometric identifier
- Credit card statements
- Criminal convictions or committed offences
- Criminal investigation reports
- Customer number
- Date of birth
- Diagnostic health information
- Disabilities
- Doctor bills
- Employees’ salaries and human resources files
- Financial profile
- Gender
- GPS position
- GPS trajectories
- Home address
- IP address
- Location derived from telecommunications systems
- Medical history
- Name
- National identifiers (e.g., passport number)
- Personal e-mail address
- Personal identification numbers (PIN) or passwords
- Personal interests derived from tracking use of internet web sites
- Personal or behavioural profile
- Personal telephone number
- Photograph or video identifiable to a natural person
- Product and service preferences
- Racial or ethnic origin
- Religious or philosophical beliefs
- Sexual orientation
- Trade-union membership
- Utility bills

## When is a data processor allowed to collect and process such data?

## How can data be used without legal grounds or for different means?

In order of priority:

1. ask consent from the data subject to get legal grounds or amend the means. ;)
2. anonymize / de-identify collected data such that it isn't considered identifiable and thus does not fall under privacy regulations
  i. data removal
  ii. data augmentation
  iii. expert determination of remaining risk

## How to de-identify personal identifiable information?

> :information_source: **INFO**
>
> De-identification in a nutshell: alter the information to not be identifiable any longer (option 1) *OR* remove all identifiable information (option 2)

A clear statement - also for practical usage - provides US HIPAA (42 CFR § 164.514(b)):

![42 CFR § 164.514(b)](./42-CFR-164-514.svg)

### Option I: Data removal (aka 'safe habor')

> [all 18 types of] identifiers of the individual or of relatives, employers, or household members of the individual, are removed

(source: 42 CFR § 164.514(b)(2)(i))

*AND*

> The covered entity does not have actual knowledge that the information could be used alone or in combination with other information to identify an individual who is a subject of the information

(source: 42 CFR § 164.514(b)(2)(i))

#### Notes

> :bulb: **HINT**
>
> if at all possible, then option 2 is the best (legal) option!
>
> Many will argue that information is 'absolutely business critical'. In such a case, the *ONLY* way to collect this data to begin with is by aquiring consent of the data subject *BEFORE* data collection.

> :warning: **WARNING**
>
> Both options imply that identifiable data is collected for the process of de-identification. Therefore, consent for the collection for the means of de-identification is required *PRIOR TO* data collection commences!

> :memo: **NOTE**
>
> A data processor which already lawfully collects data having the data subject's consent can also de-identify the collected information (if it is within the legal grounds for collection). Such de-identified information can be freely shared.

> :warning: **WARNING**
>
> Option 1 leaves room for opinions on wheter the resulting information is to be considered non-identifyable or not. Therefore, the (legal) risk exposure is higher compared to option 2!

> :warning: **CAUTION**
>
> Some argue that encryption is not a valid way of de-identification because by definition it can be reversed.
>
> This is true only for the entity which holds the encryption key! To be more specific:
>
> - symmetrical encryption is not de-identifing because the same encryption key can be used to decrypt data. Hence: the entity encryption can also decrypt.
> - assymetrical encryption on the other hand is de-identifying *for the encrypting entity* because a different, private, key has to be known for decryption. If the encrypting entity does not - and will not be able to - get possition of this key, by definition, this entity cannot decrypt the information. Here: it is de-identified in the eyes of one entity but not de-identitified from another entities point of view (having knowledge about the private key)

### Option IIa: Data augmentation

Apply statistical or scientific principles such
> that the risk is very small that the information could be used, alone or in combination with other reasonably available information, by an anticipated recipient to identify an individual who is a subject of the information

(source: 42 CFR § 164.514(b)(1)(i)

*AND*

> Documents the methods and results of the analysis that justify such determination

(source: 42 CFR § 164.514(b)(1)(ii)

> :warning: **WARNING**
>
> Documentation of which information is collected, which augmentation is applied and a rational why the result is deemed de-identified is highly important!

### Methods

There are multiple categories of anonymisation methods used.

#### Randomization - Noise Addition

> When processing a dataset, an observer will assume that values are accurate but this will only be true to a certain degree. As an example, if an individual’s height was originally measured to the nearest centimetre the anonymised dataset may contain a height accurate to only +-10cm. If this technique is applied effectively, a third-party will not be able to identify an individual nor should he be able to repair the data or otherwise detect how the data have been modified.

(source: EU Article 29 Data Protection Working Party (WP 216) Chapter 3 Section 1.1)

#### Suppression (aka Removal)

> In this method, certain values of the attributes are replaced by an asterisk '*'. All or some values of a column may be replaced by '*'. In the anonymised table below, we have replaced all the values in the 'Name' attribute and all the values in the 'Religion' attribute have been replaced by a '*'.

(source: Wikipedia)

#### Generalization (aka substitution)

> In this method, individual values of attributes are replaced by with a broader category. For example, the value '19' of the attribute 'Age' may be replaced by ' ≤ 20', the value '23' by '20 < Age ≤ 30' , etc.

(source: Wikipedia)

#### Notes

> :warning: **WARNING**
>
> An effective anonymisation solution prevents all parties from singling out an individual in a dataset, from linking two records within a dataset (or between two separate datasets) and from inferring any information in such dataset. *Generally speaking, therefore, removing directly identifying elements in itself is not enough to ensure that identification of the data subject is no longer possible.* It will often be necessary to take additional measures to prevent identification, once again depending on the context and purposes of the processing for which the anonymised data are intended.
>
> Source: EU Article 29 Group, Working Paper (WP 216) Chapter 2 Section 2.2Anonimization is performed on a record basis and not on the entire dataset. It is a common missconception that if single records are not linkable to a patient then a whole dataset does also not allow such link!

### Option IIb: Risk assessment (aka 'expert determination')

> Expert Determination takes a risk-based approach to de-identification that applies current standards and best practices from the research to determine the likelihood that a person could be identified from their protected health information. This method requires that a person with appropriate knowledge of and experience with generally accepted statistical and scientific principles and methods render the information not individually identifiable. It requires:
>
> 1. That the risk is very small that the information could be used alone, or in combination with other reasonably available information, by an anticipated recipient to identify an individual who is a subject of the information
> 2. Documents the methods and results of the analysis that justify such a determination.

(source: [Wikipedia](https://en.wikipedia.org/wiki/De-identification))

#### Notes

> :bulb: **HINT**
>
> a possible way of documentation is a Data Privacy Impact Assessment (DPIA).

> :bulb: **HINT**
>
> United States Office of Civil Rights (OCR) and United States Department of Health and Human Services (HHS) issued a [Guidance  Regarding Methods for De-identification of Protected Health Information in Accordance with the Health Insurance Portability and Accountability Act
(HIPAA) Privacy Rule](https://www.hhs.gov/sites/default/files/ocr/privacy/hipaa/understanding/coveredentities/De-identification/hhs_deid_guidance.pdf) in 2012.

## Are there any exceptions?

Yes, there are!

### Overruling laws

Quite often, data protection legislation is a subsequent law. This means that other laws take precedense, if required.
For example, an IP address often cannot be removed because other laws - e.g. law about anti-terrorist, online media, digital service provider, ... - require the collection and storage of such data.

Laws taking precedense over data protection laws result in two things:

1. They set forth the legal ground of collecting identifiable information
2. Consent of the data subject / individual is not required

> :warning: **WARNING**
>
> The legal ground for the collection of such data is also restricted to how such collected data can be processed!
>
> For example, the collection of an IP address might be required by a law, but only to answer requests from law enforcement agencies. This does not allow a data processor to use this data for other means as specified in such laws without consent of the data subject / individual!

> :warning: **WARNING**
>
> In such a case the data subject / individual still has to be informed about the data collection under data protection laws!
