# Introduction

> A **SOFTWARE BILL OF MATERIAL** (software BOM) is a list of components in a piece of software. Software vendors often create products by assembling open source and commercial software components. The software BOM describes the components in a product. It is analogous to a list of ingredients on food packaging.
>
> The concept of a BOM is well-established in traditional manufacturing as part of supply chain management. A manufacturer uses a BOM to track the parts it uses to create a product. If defects are later found in a specific part, the BOM makes it easy to locate affected products.
>
> A software BOM is useful both to the builder (manufacturer) and the buyer (customer) of a software product. Builders often leverage available open source and third-party software components to create a product; a software BOM allows the builder to make sure those components are up to date and to respond quickly to new vulnerabilities. Buyers can use a software BOM to perform vulnerability or license analysis, both of which can be used to evaluate risk in a product. Many companies are using Microsoft Excel for BOM management, or their BOM software. Efficient prior to 2010 before online tools streamline the process, there are additional risks and issues using a spreadsheet.
>
> Understanding the supply chain of software, obtaining a software BOM, and using it to analyze known vulnerabilities are crucial in managing risk.
>
> The Cyber Supply Chain Management and Transparency Act of 2014 was US legislation that proposed to require government agencies to obtain software BOMs for any new products they purchase. It also would have required obtaining software BOMs for "any software, firmware, or product in use by the United States Government". Thought it ultimately didn't pass, this act did bring awareness to government and spurred later legislation such as "Internet of Things Cybersecurity Improvement Act of 2017."

source: "Software Bill of Material (SBOM)", Wikipedia,  https://en.wikipedia.org/wiki/Software_bill_of_materials


# Abbreviations

| **Abbreviation** | **Description**                         |
| ------------ | ----------------------------------- |
| CPE          | Common Product Enumeration          |
| CVD          | Coordinated Vulnerablity Disclosure |
| CVE          | Common Vulnerability Enumeration    |
| IEC 62304    | IEC 62304:2006+A1:2015              |
| PURL         | Package Manager URL                 |
| SBOM         | Software Bill of Material           |
| SOUP         | Software of Unknown Provenance      |


# Data Formats

The [National Telecommunications and Information Administration (NTIA)](https://www.ntia.doc.gov/SoftwareTransparency) of the United States Department of Commerce recommends amongst others the following data formats for SBOMs:


## SPDX
|                 |      |
| :-------------- | :--- |
| **Description** | An open standard for communicating software bill of material information, including components, licenses, copyrights, and security references. SPDX reduces redundant work by providing a common format for companies and communities to share important data, thereby streamlining and improving compliance. |
| **Link**        | (https://spdx.dev/) |
| **Spec**        | (https://spdx.github.io/spdx-spec/)


## CycloneDX

|                 |      |
| :-------------- | :--- |
| **Description** | CycloneDX is a lightweight SBOM specification designed for use in application security contexts and supply chain component analysis. |
| **Link**        | (https://cyclonedx.org/) |
| **Spec**        | (https://github.com/CycloneDX/specification) |


# Requirements

Each SBOM must comply with the following requirements:

<table style="line-width: 1px; line-color: black;">
    <tr style="background: lightgray; color: black;">
        <th>MoSCoW</th>
        <th>Requirement</th>
        <th>Rational</th>
    </tr>
    <!-- MUST -->
    <tr>
        <th style="background: red;" rowspan="6">MUST</th>
        <td>A unique CPE <strong>MUST</strong> be defined for each release.</td>
        <td>CPE are required for use-case "vulnerability analysis based on CVE databases".</td>
    </tr>
    <tr>
        <td>A file describing the SBOM <strong>MUST</strong> be created for each release / unique CPE.</td>
        <td>A unique CPE helps a lot for a CVD process.</td>
    </tr>
    <tr>
        <td>Either CycloneDX or SPDX <strong>MUST</strong> be used as file format.</td>
        <td>Common formats with wide tool support</td>
    </tr>
    <tr>
        <td>Each SBOM <strong>MUST</strong> contain at least the list of SOUP according to IEC 62304.</td>
        <td>
            <p>SOUPs are dependencies of the 1st order. These have to be included in the SBOM.<p>
            <p>This makes a SBOM "viable".</p>
        </td>
    </tr>
    <tr>
        <td>Each SBOM entry <strong>MUST</strong> contain at least the information listed in section "Minimum Content".</td>
        <td> See "Minimum Content"</td>
    </tr>
    <tr>
        <td>Each SBOM <strong>MUST</strong> contain the relationships between software components.</td>
        <td>Dependencies between software components will be used to identify regulatory entities, e.g. which SOUP is affected, and trigger other processes for corrective actions.</td>
    </tr>
    <!-- SHOULD -->
    <tr>
        <th style="background: yellow;" rowspan="7">SHOULD</th>
        <td>SPDX v.2.2 or CycloneDX v1.2 **SHOULD** be used as file format.</td>
        <td>Latest versions as of writing this document. Newer versions can still be used since this is a SHOULD requirement, not a MUST.</td>
    </tr>
    <tr>
        <td>CPE v2.3 **SHOULD** be used.</td>
        <td>CPE v2.3 is easier to generate and read compared to v2.2.</td>
    </tr>
    <tr>
        <td><p>Each SBOM **SHOULD** contain a list of all software components, libraries and 3rd party products which may have security implications.</td>
        <td>In addition to SOUPs, recursive dependencies of the 2nd order or more help a lot in identifying potential license or vulnerability issues.</p><p>This makes a SBOM "usable".</p></td>
    </tr>
    <tr>
        <td>Each SBOM entry **SHOULD** contain declared or assumed license information. | Declared or assumed licensed are required for use-case "license and legal compliance".</td>
    </tr>
    <tr>
        <td>A SBOM related to software running on an embedded device **SHOULD** be classified as "operating system" (o) in CPE.</td>
        <td rowspan="2">
            <p>The terms "software", "firmware" and "application" are used differently around the world.</p>
            <p>Within CVE databases, an unwritten rule can be observed that embedded software is called "Firmware".</p>
            <p>Within CPE, the hiearchy is:<br/>
            <ul>
                <li>h = hardware = embedded hardware = e.g.  hardware</li>
                <li>o = operating system = runs on hardware = e.g.  firmware consisting of QNX including HMI and business logic of the embedded device running on  hardware</li>
                <li>a = application = runs on operating system = e.g. user installable software on a general purpose operating system like Windows or Android.<br/>
                → this does not exist on a .  on the other hand is an application!</li>
            </ul>
        </td>
    </tr>
    <tr>
        <td>
            <p>A SBOM related to software running on an embedded device **SHOULD** follow the naming convention</p>
            <!-- SBOM naming convention for software running on embedded devices -->
            <code>&lt;product name&gt; Firmware</code>
        </td>
    </tr>
    <tr>
        <td>A SBOM <strong>SHOULD</strong> contain information listed in section "Additional Content".</td>
        <td>Additional content covers information which will be useful in dependent processes.</td>
    </tr>
    <!-- COULD -->
    <tr>
        <th style="background: blue;">COULD</th>
        <td>Each SBOM **COULD** contain an exhaustive list of all software components included in the release, e.g. libraries a SOUP depends on.</td>
        <td>
            <p>In addition to SOUPs, recursive dependencies of the 2nd order or more help a lot in identifying potential license or vulnerability issues.</p>
            <p>This makes a SBOM "complete".</p>
        </td>
    </tr>
</table>


# Minimum Content

<table>
    <colgroup>
        <col style="width: 101.0px;" />
        <col style="width: 142.0px;" />
        <col style="width: 244.0px;" />
        <col style="width: 199.0px;" />
        <col style="width: 367.0px;" />
    </colgroup>
    <tbody>
        <tr>
            <th rowspan="2">Scope</th>
            <th rowspan="2">Field</th>
            <th rowspan="2">Rational</th>
            <th colspan="2">Format</th>
        </tr>
        <tr>
            <th>SPDX</th>
            <th>CycloneDX</th>
        </tr>
        <tr>
            <th>SBOM</th>
            <th>SBOM Author</th>
            <td>
                <ul>
                    <li>core SBOM field defined by NTIA</li>
                    <li>IEC 62304, chapter 8.1.2a</li>
                </ul>
            </td>
            <td>(2.8) Creator</td>
            <td>bom-descriptor: metadata/manufacturer/contact</td>
        </tr>
        <tr>
            <th rowspan="8">SBOM Entry</th>
            <th>Component</th>
            <td>
                <ul>
                    <li>core SBOM field defined by NTIA</li>
                </ul>
            </td>
            <td>(3.1) PackageName</td>
            <td>name</td>
        </tr>
        <tr>
            <th>Unique Identifier</th>
            <td>
                <ul>
                    <li>core SBOM field defined by NTIA</li>
                    <li>IEC 62304, chapter 8.1.2c</li>
                </ul>
            </td>
            <td>(3.2) SPDXID</td>
            <td>bom/serialNumber and component/bom-ref</td>
        </tr>
        <tr>
            <th>Version</th>
            <td>
                <ul>
                    <li>core SBOM field defined by NTIA</li>
                    <li>IEC 62304, chapter 8.1.2c</li>
                </ul>
            </td>
            <td>(3.3) PackageVersion</td>
            <td>version</td>
        </tr>
        <tr>
            <th>Supplier</th>
            <td>
                <ul>
                    <li>core SBOM field defined by NTIA</li>
                </ul>
            </td>
            <td>(3.5) PackageSupplier</td>
            <td>publisher</td>
        </tr>
        <tr>
            <th>Component Hash</th>
            <td>
                <ul>
                    <li>core SBOM field defined by NTIA</li>
                    <li>IEC 62304, chapter 8.1.2c</li>
                </ul>
            </td>
            <td>(3.10) PackageChecksum</td>
            <td>hash</td>
        </tr>
        <tr>
            <th>Relationship</th>
            <td>
                <ul>
                    <li>core SBOM field defined by NTIA</li>
                </ul>
            </td>
            <td>(7.1) Relationship: CONTAINS</td>
            <td>(nested assembly/subassembly and/or depdency graphs)</td>
        </tr>
        <tr>
            <th>CPE</th>
            <td>
                <ul>
                    <li>required for vulnerability analysis</li>
                    <li>IEC 62304, chapter 8.1.2c</li>
                </ul>
            </td>
            <td>
                <p>(3.21) Extermal Reference</p>
                <p>type: SECURITY</p>
            </td>
            <td>cpe</td>
        </tr>
        <tr>
            <th>Package Manager</th>
            <td>
                <ul>
                    <li>required for bug analysis</li>
                    <li>IEC 62304, chapter 8.1.2c</li>
                </ul>
            </td>
            <td>
                <p>(3.21) Extermal Reference</p>
                <p>type:&nbsp;<code>PACKAGE-MANAGER</code></p>
            </td>
            <td>purl</td>
        </tr>
    </tbody>
</table>

<p>Source: [NTIA](https://www.ntia.gov/SBOM), [Survey of Existing SBOMFormats and Standards](https://www.ntia.gov/files/ntia/publications/ntia_sbom_formats_and_standards_whitepaper_-_version_20191025.pdf)


## Additional Content

<table>
    <colgroup>
        <col style="width: 99.0px;" />
        <col style="width: 142.0px;" />
        <col style="width: 244.0px;" />
        <col style="width: 199.0px;" />
        <col style="width: 367.0px;" />
    </colgroup>
    <tbody>
        <tr>
            <th rowspan="2">Scope</th>
            <th rowspan="2">Field</th>
            <th rowspan="2">Rational</th>
            <th colspan="2">Format</th></tr>
        <tr>
            <th>SPDX</th>
            <th>CycloneDX</th></tr>
        <tr>
            <th>SBOM</th>
            <th>./.</th>
            <td>./.</td>
            <td>./.</td>
            <td>./.</td></tr>
        <tr>
            <th rowspan="2">SBOM Entry</th>
            <th>Home Page</th>
            <td>
                <ul>
                    <li>IEC 62304, chapter 6.1f</li>
                    <li>IEC 62304, chapter 7.1.3</li>
                    <li>IEC 62304, chapter 8.1.2a</li>
                </ul>
            </td>
            <td>(3.11) PackageHomePage</td>
            <td>
                <p>reference</p>
                <p>type: website</p>
            </td>
        </tr>
        <tr>
            <th>Issue Tracker</th>
            <td>
                <ul>
                    <li>IEC 62304, chapter 6.1f</li>
                    <li>IEC 62304, chapter 7.1.3</li>
                </ul>
            </td>
            <td>
                <p>(3.21) Extermal Reference</p>
                <p>type: OTHER</p>
            </td>
            <td>
                <p>reference</p>
                <p>type: issue-tracker</p>
            </td>
        </tr>
    </tbody>
</table>


# Examples (informative)


## Common Product Enumeration (CPE)


### wfn notation

```
    wfn:
    [
    part="a",
    vendor="Name_of_vendor_w\._a_dot",
    product="Windows 11",
    version="22621.521",
    edition="22H2"
    ]
```

NOTE: wfn encodes " " with "_"
NOTE: wfn encodes "." with "\\."


### cpe v2.3 notation

```
cpe:2.3:a:Name_of_vendor_w._a_dot:Windows_11:22621.521:*:22H2:*:*:*:*:
```

NOTE: CPE encodes " " with "_"
NOTE: CPE encodes "." with "."


## SPDX Example

The following shows a very basic example of a device called "Rubics Cube", with a firmware having version "0815.42".

NOTE: There is a RDF (= XML) version of SPDX as well, which is equivalent to the ```tag:value``` format shown in the example.

```
## =================================
## SPDX v2.3.0, Chapter 2 Document Creation Information
## https://spdx.github.io/spdx-spec/v2.3/document-creation-information/
## =================================
##
## SPDX v2.3.0, Chapter 6.1 SPDX version field
SPDXVersion: SPDX-2.3
## SPDX v2.3.0, Chapter 6.2 Data license field
DataLicense: CC0-1.0
## SPDX v2.3.0, Chapter 6.3 SPDX Identifier
SPDXID: SPDXRef-DOCUMENT
## SPDX v2.3.0, Chapter 6.4 Document name field
DocumentName: Rubics Cube 0815.42
## SPDX v2.3.0, Chapter 6.5 SPDX document namespace field
DocumentNamespace: https://rubics.cube.rocks
## SPDX v2.3.0, Chapter 6.6 External document references field
## SPDX v2.3.0, Chapter 6.7 License list version field
## SPDX v2.3.0, Chapter 6.8 Creator field
Creator: Organization: The Magicians
## SPDX v2.3.0, Chapter 6.9 Created field
Created: 2019-04-13T17:42:00Z
## SPDX v2.3.0, Chapter 6.10 Creator comment field
CreatorComment: <text>Example Comment</text>
## SPDX v2.3.0, Chapter 6.11 Document comment field
 
## =================================
## SPDX v2.3.0, Chapter 7 Package Information
## https://spdx.github.io/spdx-spec/v2.3/package-information/
## =================================
##
## Primary Component (described by the SBOM)
## = Rubics Cube firmware 0815.42
##
## SPDX v2.3.0, Chapter 7.1 Package name
PackageName: RubicsCube-0815.42
## SPDX v2.3.0, Chapter 7.2 Package SPDX identifier
SPDXID: SPDXRef-RubicsCube-0815.42
## SPDX v2.3.0, Chapter 7.3 Package version
PackageVersion: 0815.42
## SPDX v2.3.0, Chapter 7.4 Package file name
## SPDX v2.3.0, Chapter 7.5 Package supplier
PackageSupplier: Organization: The Magicians
## SPDX v2.3.0, Chapter 7.6 Package originator
## SPDX v2.3.0, Chapter 7.7 Package download location
PackageDownloadLocation: NOASSERTION
## SPDX v2.3.0, Chapter 7.8 Files analyzed
FilesAnalyzed: false
## SPDX v2.3.0, Chapter 7.9 Package verification code
## SPDX v2.3.0, Chapter 7.10 Package checksum
## SPDX v2.3.0, Chapter 7.11 Package home page
## SPDX v2.3.0, Chapter 7.12 Source information
## SPDX v2.3.0, Chapter 7.13 Concluded license
PackageLicenseConcluded: NOASSERTION
## SPDX v2.3.0, Chapter 7.14 All Licenses information from files
## SPDX v2.3.0, Chapter 7.15 Declared license
PackageLicenseDeclared: NOASSERTION
## SPDX v2.3.0, Chapter 7.16 Comments on license
## SPDX v2.3.0, Chapter 7.17 Copyright text
PackageCopyrightText: NOASSERTION
## SPDX v2.3.0, Chapter 7.18 Package summary description
## SPDX v2.3.0, Chapter 7.19 Package detailed description
## SPDX v2.3.0, Chapter 7.20 Package comment
PackageComment: <text>Software image for Rubics Cube: version 0815.42</text>
## SPDX v2.3.0, Chapter 7.21 External reference
ExternalRef: SECURITY cpe23Type cpe:2.3:o:The_Magicians:RubicsCube_firmware:0815.42:*:*:*:*:*:*:*
## SPDX v2.3.0, Chapter 7.22 External reference comment
## SPDX v2.3.0, Chapter 7.23 Package attribution text
## SPDX v2.3.0, Chapter 7.24 Primary package purpose
PrimaryPackagePurpose: FIRMWARE
## SPDX v2.3.0, Chapter 7.25 Release date
ReleaseDate: 2019-04-13T17:42:00Z
## SPDX v2.3.0, Chapter 7.26 Built date
BuiltDate: 2019-04-13T07:00:00Z
## SPDX v2.3.0, Chapter 7.27 Valid Until Date
ValidUntilDate: 2025-04-13T07:00:00Z
## SPDX v2.3.0, Chapter 11.1 Relationship
Relationship: SPDXRef-DOCUMENT DESCRIBES SPDXRef-RubicsCube-0815.42
Relationship: SPDXRef-RubicsCube-0815.42 CONTAINS NONE
## SPDX v2.3.0, Chapter 11.2 Relationship Comment
 
 
##
## SOUP: QNX RTOS
##
PackageName: QNX RTOS
SPDXID: SPDXRef-QNX-RTOS
PackageVersion: 6.3.2
PackageDownloadLocation: NOASSERTION
FilesAnalyzed: false
PackageLicenseConcluded: NOASSERTION
PackageLicenseDeclared: NOASSERTION
PackageCopyrightText: NOASSERTION
ExternalRef: SECURITY cpe23Type cpe:2.3:a:qnx:rtos:6.3.2:*:*:*:*:*:*:*
ExternalRef: SECURITY cpe23Type cpe:2.3:a:blackberry:qnx_momentics:6.3.2:*:*:*:*:*:*:*
Relationship: SPDXRef-RubicsCube-0815.42 CONTAINS SPDXRef-QNX-RTOS
Relationship: SPDXRef-QNX-RTOS CONTAINS NOASSERTION 
 
 
##
## SOUP: libpng
##
PackageName: libPNG
SPDXID: SPDXRef-libpng
PackageVersion: 1.2.56
PackageDownloadLocation: NOASSERTION
FilesAnalyzed: false
PackageLicenseConcluded: NOASSERTION
PackageLicenseDeclared: NOASSERTION
PackageCopyrightText: NOASSERTION
ExternalRef: SECURITY cpe23Type cpe:2.3:a:libpng:libpng:1.2.56:*:*:*:*:*:*:*
Relationship: SPDXRef-RubicsCube-0815.42 CONTAINS SPDXRef-libpng
Relationship: SPDXRef-libpng CONTAINS NOASSERTION   
 
 
##
## SOUP: libsqlite
##
PackageName: SQLite
SPDXID: SPDXRef-libsqlite
PackageVersion: 3.7.4
PackageDownloadLocation: NOASSERTION
FilesAnalyzed: false
PackageLicenseConcluded: NOASSERTION
PackageLicenseDeclared: NOASSERTION
PackageCopyrightText: NOASSERTION
ExternalRef: SECURITY cpe23Type cpe:2.3:a:sqlite:sqlite:3.7.4:*:*:*:*:*:*:*
Relationship: SPDXRef-RubicsCube-0815.42 CONTAINS SPDXRef-libsqlite
Relationship: SPDXRef-libsqlite CONTAINS NOASSERTION
 
 
##
## SOUP: zlib
##
PackageName: zlib
SPDXID: SPDXRef-zlib
PackageVersion: 1.2.8
PackageDownloadLocation: NOASSERTION
FilesAnalyzed: false
PackageLicenseConcluded: NOASSERTION
PackageLicenseDeclared: NOASSERTION
PackageCopyrightText: NOASSERTION
ExternalRef: SECURITY cpe23Type cpe:2.3:a:gnu:zlib:1.2.8:*:*:*:*:*:*:*
Relationship: SPDXRef-RubicsCube-0815.42 CONTAINS SPDXRef-zlib
Relationship: SPDXRef-zlib CONTAINS NOASSERTION
```
