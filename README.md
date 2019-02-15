# Magento 2 Twitter Widget Extension 

## 1. Documentation
- [Installation guide](https://www.mageplaza.com/install-magento-2-extension/)
- [User guide](https://docs.mageplaza.com/twitter-widget/index.html)
- [Introduction page](http://www.mageplaza.com/magento-2-twitter-widget/)
- [Contribute on Github](https://github.com/mageplaza/magento-2-twitter-widget)
- [Get Support](https://github.com/mageplaza/magento-2-twitter-widget/issues)


## 2. FAQ

**Q: I got error: Mageplaza_Core has been already defined**

A: Read solution: https://github.com/mageplaza/module-core/issues/3

**Q: How many Twitter Widget types can be supported to display on sites?**

A: There are 2 types including timeline and Tweets.

**Q: How can a viewer interact with a Tweet on the store site?**

A: They can like, share and follow easily.

**Q: How can I hide/show a video/photo on a Tweet?**

A: You can configure it in the backend by allowing hiding/showing media.

**Q: How to show/hide a Tweet thread?**

A: You need to go to Widget Options > Hide Thread, then enable or disable it.

**Q: Can the Twitter widget appearance be customized?** 

A: Yes, the users can customize any Twitter Widget ‘s elements, color, and dimensions to match store themes.

**Q: Can the widget be moved to any other positions and pages?**

A:  Yes, with the help of Snippet widget, users can place the widget anywhere they want.


## 3. How to install Twitter Widget extension for Magento 2

Install via composer (recommend)

Run the following command in Magento 2 root folder:

```
composer require mageplaza/module-twitter-widget
php bin/magento setup:upgrade
php bin/magento setup:static-content:deploy
```

## 4. Highlight Features 

### Various styles to embed

Timeline and Tweets are the two embedded styles supported by Mageplaza Twitter Widget.

#### Embedded Timeline

By pasting the URL of a Twitter account from the backend, the store can easily show the latest Tweets based on a twitter account, list or even curated collections. As a result, the recent Tweets can be viewed in a compact and linear view on store sites.

![Imgur](https://i.imgur.com/KuDm3BW.gif)

#### Embedded Tweets

Admins are allowed to pick the most interesting Tweets to display on sites. By adding attractive photos, video, card media, and even live stream video, customers will have the chance to experience sites with excitement and curiosity. In addition, store owners can add any Tweets to any positions easily by copying and pasting.

![Imgur](https://i.imgur.com/NF72890.png)

### Interact directly with Tweets on sites

#### Like, share and follow 

The feature enhances the user experience significantly by allowing Twitter users to interact with their favorite Tweets. In details, they can Like or Share those Tweets to numerous social channels including Facebook, Linked, Twitter, Linked and Tumblr in a matter of seconds.

#### Use hashtag or mention to reach new Tweets 

The buyers are able to redirect to a new Tweet by clicking a Tweets’ hashtag or mention.

![Imgur](https://i.imgur.com/gwlF4Fo.png)

### Media Supported

The module assists to display photos and videos of any Tweets easily. The store owners can place the twitter block right at the homepage to attract visitors with beautiful and artistic thumbnails. 

Besides, displaying images, amazing videos can also be placed on shopping sites to attract customers to remain on your sites. This is a smart way to draw shoppers attention and also reduce sites’ bounce rate.


![Imgur](https://i.imgur.com/MOuScCZ.gif)

### Easy to customize the display of Twitter

The Twitter block‘s style can be customized to better suit the color concept of the sites with ease. Here are typical elements which admins can change in the block designs: 
- Theme 
- Color of the link
- Color of the border 
- Width of the block 
- Height of the block 

The flexible customization helps admins to design the page appearance to suit specific business purposes.

![Imgur](https://i.imgur.com/MXwa8vl.png)

### Supporting snippet widget    

By using the snippet widget, the Twitter block can be placed in any positions for specific purposes. In particular, owners only need to embed the snippet code on CMS page, Static Block, .PHTML file, Layout file in order to show Tweets on certain positions.

![Imgur](https://i.imgur.com/N2NisqH.png)

## 5. More Features 

### Limit the Tweets 

The Tweet number displayed on the block can be restricted.

### Threat display  

Admins can configure in the backend to view or hide thread related to a Tweet.

### Show media

The thumbnails, videos or links can be hidden or showed.

## 6. Full Features List

### For store admins
- Allow enabling/disabling the module
- Hide/ Show the Follow button 
- Allow setting username for the Twitter account 
- Allow selecting widget theme
- Allow selecting colors on widget links
- Allow setting widget border color 
- Able to set the widget’s width and height 
- Easy to show the widget by inserting the snippet code  

### For customers
- Update recent news on Twitter right on sites
- Interact with updated Tweets with ease 
- Have better experience during shopping on sites 


## 7. User Guide

### How to use

Customers can see the Twitter images at any pages 

![Twitter widget 1](https://i.imgur.com/JNK2iT8.png)

### How to Configure

#### 1. Configuration

From the Admin panel, Choose `Stores > Configuration > Mageplaza > Twitter Widget`

![Twitter widget 2](https://i.imgur.com/aeO6e0e.png)

##### 1.1. General Configuration

![Twitter widget 3](https://i.imgur.com/mVuC4E4.png)

- **Enable**: Select `Yes` to enable the module.
- **Show Follow Button**: Choose `Yes` to show the **Follow button** for a Twitter account 
- **Username**: 
  - Fill in the **Username** of a Twitter account 
  - You need to insert an appropriate **Twitter username** if you want to show the **Follow Button**


##### 1.2. Display

![Twitter widget 4](https://i.imgur.com/XmwyTW8.png)

- **Theme**: Choose a theme to display the Twitter Widget. There are 2 themes that you can choose from which is **Light** and **Dark**.
- **Link color**: Customize the color of the links, mention @ and hashtag # that appear in a Tweet.
- **Border color**: Set the border color of the Twitter Widget.
- **Widget width**: 
  - Set the width of the widget
  - The minimum width is 180px and the maximum width is 1200px.
  - If the information is left blank, the width will be set automatically. 
- **Widget height**:
  - Set the maximum height of the widget
  - The maximum height should be above 200px
  
  
  ##### 1.3. Snippet Code
  
  ![Twitter widget 5](https://i.imgur.com/iKgafSQ.png)

- **XML File**: Copy and paste the code into a file that includes.xml where you want to display the Twitter Widget in the frontend.
- **CMS Page, CMS Static Block**: Copy and paste the code to the CMS page or CMS block you want to display the Twitter Widget in the frontend.
- **Template .phtml file**: Copy and paste the code into the .phtml file where you want to display the Twitter Widget in the frontend.


#### 2. Configure Widget

**Add Widget**
**Step 1: Select the Widget Type**
**Step 2: Complete the Storefront Properties section**
**Step 3: Configure the Widget Options in order to show Instagram images**


**Step 1: Select the Type**
- On the Panel Admin, `Content > Elements > Widgets`
- In the upper-right corner of Widgets, click on **Add Widget** button.
- In the **Settings** section:
  - Choose **CMS Static Block** type in the **Type** box.
  - Choose the current theme you are applying in the **Design Theme**.
  - Click **Continue** button.
  
  ![Twitter widget 6](https://i.imgur.com/K8YV2TD.png)

**Step 2: Complete the Storefront Properties section**
- In the **Storefront Properties** section,
  - Enter **Widget Title** for the internal use
  - Show the block at all or any store views in the **Assign to Store View** field.
  - Set the **Sort Order** if many blocks are placed at the same container. The block with zero value will appear at the top.
  
  ![Twitter widget 7](https://i.imgur.com/cuTjCgr.png)

- In the **Layout Updates** section, click on **Layout Update** to set the layout.
  - Choose the category, product, or page where shows the block in the **Display on the** field.
  - If set to a specific page, you need to choose Page you want the block to display and set **Container** that is the position of the block.
  
  ![Twitter widget 8](https://i.imgur.com/3UkevTT.png)

**Step 3: Configure the Widget Options to show Twitter Widget**
- **Title**: Enter the title of the Twitter Widget to display in the frontend
- **Description**: Enter a description for the Twitter Widget to view in the frontend
- **Display**
  - *Display = Use Config*: Use **Theme, Link Color, Border Color, Widget width, Widget height** in the **Configuration** to show Twitter Widget in the frontend.
  - *Display = Custom*: Admins can set up Twitter Widget display in  the frontend (Theme, Link Color, Border Color, Widget width, Widget height).
  
  ![Twitter widget 9](https://i.imgur.com/QVmT19S.png)


- **Type**
  - *Type = Timeline*: Show the latest Tweets of an account as a timeline.
  - *Twitter timeline URL*: The links will redirect to the timeline of a public account that admins want to display on the widget.
  - **Chrome**: Configure all the elements that display on the widget
    - **Noheader**: Hide the widget header
    - **Nofooter**: Hide the widget footer
    - **Noborder**: Hide the widget border
    - **Transparent**: Disable background color, only display the background color when hovering through a certain Tweet on the timeline
    - **Noscrollbar**: Disable the widget scroll bar
- **Number of Tweet Display**: Limit the number of displayed Tweet between **1-20**. If the field is left blank, **Show more Tweets** button will appear.

![Twitter widget 10](https://i.imgur.com/t6Xdrjg.png)

- **Type = Tweet**: Display Tweets and replied Tweets.
- **Twitter timeline URL**: The links of the Tweet redirecting to Twitter page.
- **Hide thread**: Choose `Yes` to hide replied Tweets that are related to a Tweets 
- **Hide Media**: Choose `Yes`to hide the images videos, and preview link related to Tweets.



