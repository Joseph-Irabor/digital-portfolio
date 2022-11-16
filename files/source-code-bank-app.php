<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Source-code-snippet</title>
    <script>
        
       
    var message = "You can not do that becuase that function is DISABLED ! \n Contact ADMIN";
    
    function rtclickcheck(keyp){ if (navigator.appName == "Netscape" && keyp.which == 3){ alert(message); return false; }
    
    if (navigator.appVersion.indexOf("MSIE") != -1 && event.button == 2) { alert(message); return false; } }
    
    document.onmousedown = rtclickcheck;
    
    </script>
</head>
<body>
    
using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Data.SqlClient;
using System.Windows.Forms;
using System.Media;

namespace BUHS_Bank
{
    public partial class Form1 : Form
    {
        SqlConnection con = new SqlConnection("Data Source=DESKTOP-HBR3DS3;Initial Catalog=bank;Integrated Security=True");
        SqlCommand command , command2;
        

        public Form1()
        {
            InitializeComponent();
        }

        private void button1_Click(object sender, EventArgs e)
        {

        }

        private void Form1_Load(object sender, EventArgs e)
        {
            labelDate.Text = DateTime.Now.Date.ToShortDateString();
        }

        private void textBox1_TextChanged(object sender, EventArgs e)
        {

        }

        private void btnDeposit_Click(object sender, EventArgs e)
        {
            panelActivities.Visible = true;
            panelActivities.Location = new Point(20, 29);
            gbActivities.Text = "Deposit Money";
           panelHome.Visible = false;
            panelBalanceEnquiry.Visible = false;
            PanelCreateAccount.Visible = false;
            panelDepositMoney.Visible = false;
            panelWithdrawMoney.Visible = false;


        }

        private void button3_Click(object sender, EventArgs e)
        {

            panelHome.Visible = true;
            panelActivities.Visible = false;
            panelBalanceEnquiry.Visible = false;
            PanelCreateAccount.Visible = false;
            panelDepositMoney.Visible = false;
            panelWithdrawMoney.Visible = false;
        }

        private void gbActivities_Enter(object sender, EventArgs e)
        {

        }

        private void button4_Click(object sender, EventArgs e)
        {
            panelHome.Visible = true;
            panelActivities.Visible = false;
            panelBalanceEnquiry.Visible = false;
            PanelCreateAccount.Visible = false;
            panelDepositMoney.Visible = false;
            panelWithdrawMoney.Visible = false;
        }

        private void btnCreateAccount_Click(object sender, EventArgs e)
        {
            panelHome.Visible = false;
            PanelCreateAccount.Visible = true;
            PanelCreateAccount.Location = new Point(20, 29);
            panelActivities.Visible = false;
            panelHome.Visible = false;
            panelBalanceEnquiry.Visible = false;
            panelDepositMoney.Visible = false;
            panelWithdrawMoney.Visible = false;
        }

        private void btnViewAccounts_Click(object sender, EventArgs e)
        {
            ViewAllAcoounts ViewAll = new ViewAllAcoounts();
            this.Hide();
            ViewAll.Show();
        }

        private void button1_Click_1(object sender, EventArgs e)
        {
            panelHome.Visible = true;
            panelActivities.Visible = false;
            panelBalanceEnquiry.Visible = false;
            PanelCreateAccount.Visible = false;
            panelDepositMoney.Visible = false;
            panelWithdrawMoney.Visible = false;

        }

        private void btnCreateNewAccount_Click(object sender, EventArgs e)
        {

            if (txtCreateAccountUsername.Text == "")
            {

                MessageBox.Show("Please enter a username", "Alert!" , MessageBoxButtons.OK, MessageBoxIcon.Error);


            }
            else if (cmbCreateAccountOpeningBalance.Text == "")
            {
                SystemSounds.Exclamation.Play();
                MessageBox.Show("Please Select Opening Balance", "ALERT !");
            }
            else
            {


                con.Open();

                command = new SqlCommand("select * from BioData where Username = '" + txtCreateAccountUsername.Text.ToUpper() + "'", con);
                SqlDataAdapter da = new SqlDataAdapter(command);
                DataTable dt = new DataTable();
                da.Fill(dt);
                if ( dt.Rows.Count == 1)
                {
                    
                    MessageBox.Show("Username Already Exists !, try something else", "ALERT !", MessageBoxButtons.OK, MessageBoxIcon.Error);
                }
                else
                {
                    try
                    {
                                               
                        command = new SqlCommand("INSERT INTO BioData ( Username,OpeningBalance, Dates)VALUES ('" + txtCreateAccountUsername.Text.ToUpper() + "', '" + cmbCreateAccountOpeningBalance.Text + "', '" + labelDate.Text + "')", con);
                        command2 = new SqlCommand("INSERT INTO Transactions ( Username,LastWithdrawal, LastDeposit, AvailableBalance, Dates)VALUES ('" + txtCreateAccountUsername.Text.ToUpper() + "', '" + 0 + "', '" + 0 + "', '" + cmbCreateAccountOpeningBalance.Text + "', '" + labelDate.Text + "')", con);
                        command.ExecuteNonQuery();
                        command2.ExecuteNonQuery();
                        SystemSounds.Exclamation.Play();
                        MessageBox.Show("Account Created", "ALERT !");
                        txtCreateAccountUsername.ResetText();
                        cmbCreateAccountOpeningBalance.ResetText();
                        con.Close();
                    }
                    catch (Exception ex)
                    {
                        SystemSounds.Exclamation.Play();
                        MessageBox.Show(ex.Message);
                    }
                }

                con.Close();
            }

        }

        private void btnWithdrawal_Click(object sender, EventArgs e)
        {
            panelActivities.Visible = true;
            panelActivities.Location = new Point(20, 29);
            gbActivities.Text = "Withdraw Money";
           panelHome.Visible = false;
            panelBalanceEnquiry.Visible = false;
            PanelCreateAccount.Visible = false;
            panelDepositMoney.Visible = false;
            panelWithdrawMoney.Visible = false;
        }

        private void btnCheckBalance_Click(object sender, EventArgs e)
        {
            panelActivities.Visible = true;
            panelActivities.Location = new Point(20, 29);
            gbActivities.Text = "Check Balance";
           panelHome.Visible = false;
            panelBalanceEnquiry.Visible = false;
            PanelCreateAccount.Visible = false;
            panelDepositMoney.Visible = false;
            panelWithdrawMoney.Visible = false;
        }

        private void btnWithdrawMoneyBack_Click(object sender, EventArgs e)
        {
            panelHome.Visible = true;
            panelActivities.Visible = false;
            panelBalanceEnquiry.Visible = false;
            PanelCreateAccount.Visible = false;
            panelDepositMoney.Visible = false;
            panelWithdrawMoney.Visible = false;
        }

        private void btnBalanceEnquiryClose_Click(object sender, EventArgs e)
        {
            panelHome.Visible = true;
            panelActivities.Visible = false;
            panelBalanceEnquiry.Visible = false;
            PanelCreateAccount.Visible = false;
            panelDepositMoney.Visible = false;
            panelWithdrawMoney.Visible = false;
        }

        private void btnDepositMoneyBack_Click(object sender, EventArgs e)
        {
            panelHome.Visible = true;
            panelActivities.Visible = false;
            panelBalanceEnquiry.Visible = false;
            PanelCreateAccount.Visible = false;
            panelDepositMoney.Visible = false;
            panelWithdrawMoney.Visible = false;
        }

        private void btnCloseAccount_Click(object sender, EventArgs e)
        {
            panelActivities.Visible = true;
            panelActivities.Location = new Point(20, 29);
            gbActivities.Text = "Close Account";
            btnActivities.Text = "Close Account";
            panelHome.Visible = false;
            btnActivities.Text = "Close Account";
            panelBalanceEnquiry.Visible = false;
            PanelCreateAccount.Visible = false;
            panelDepositMoney.Visible = false;
            panelWithdrawMoney.Visible = false;
        }

        private void btnActivities_Click(object sender, EventArgs e)
        {
            if ( gbActivities.Text =="Deposit Money")
            {
                // TO CHECK IF USERNAME EXISTS FOR DEPOSIT
                SqlDataAdapter sdaDeposite = new SqlDataAdapter(@"SELECT * FROM [dbo].[BioData] where Username ='" + txtActivitiesUsername.Text.ToUpper() + "';", con);
                DataTable dtDeposite = new DataTable();
                sdaDeposite.Fill(dtDeposite);

                if (dtDeposite.Rows.Count == 1)
                {

                    panelActivities.Visible = false;
                    panelDepositMoney.Visible = true;
                    labelDepositDisplayUsername.Text = txtActivitiesUsername.Text;
                    panelDepositMoney.Location = new Point(20, 29);
                    panelHome.Visible = false;
                    panelBalanceEnquiry.Visible = false;
                    PanelCreateAccount.Visible = false;
                    panelWithdrawMoney.Visible = false;
                    txtActivitiesUsername.Clear();
                   
                }

                else
                {

                    MessageBox.Show("Username doest not exist!", "ALERT", MessageBoxButtons.OK, MessageBoxIcon.Error);
                }
            }

                else if (gbActivities.Text =="Withdraw Money")
                {

                    // TO CHECK IF USERNAME EXISTS FOR WITHDRAWAL
                SqlDataAdapter sdaWithdraw = new SqlDataAdapter(@"SELECT * FROM [dbo].[BioData] where Username ='" + txtActivitiesUsername.Text.ToUpper() + "';", con);
                DataTable dtWithdraw = new DataTable();
                sdaWithdraw.Fill(dtWithdraw);

                if (dtWithdraw.Rows.Count == 1)
                {

                    panelActivities.Visible = false;
                    panelDepositMoney.Visible = false;
                    labelWithdrawMoneyDisplayUsername.Text = txtActivitiesUsername.Text;
                    panelWithdrawMoney.Visible = true;
                    panelWithdrawMoney.Location = new Point(20, 29);
                    panelHome.Visible = false;
                    panelBalanceEnquiry.Visible = false;
                    PanelCreateAccount.Visible = false;
                   txtActivitiesUsername.Clear();
                }
                }

            else if (gbActivities.Text =="Close Account")
            {
                // TO CHECK IF USERNAME EXISTS FOR WITHDRAWAL
                SqlDataAdapter sdaCloseAccount = new SqlDataAdapter(@"SELECT * FROM [dbo].[BioData] where Username ='" + txtActivitiesUsername.Text.ToUpper() + "';", con);
                DataTable dtCloseAccount = new DataTable();
                sdaCloseAccount.Fill(dtCloseAccount);

                if (dtCloseAccount.Rows.Count == 1)
                {
                    con.Open();

                    SqlCommand cmdCloseAccount = new SqlCommand(@"DELETE FROM [dbo].[BioData] WHERE Username ='"+txtActivitiesUsername.Text.ToUpper()+"'",con);
                    cmdCloseAccount.ExecuteNonQuery();
                    MessageBox.Show("Account deleted from database ", txtActivitiesUsername.Text, MessageBoxButtons.OK, MessageBoxIcon.Exclamation);
                   
                    con.Close();
                    
                    
                    panelDepositMoney.Visible = false;
                    panelWithdrawMoney.Visible = false;
                    panelHome.Visible = false;
                    panelBalanceEnquiry.Visible = false;
                    PanelCreateAccount.Visible = false;
                    txtActivitiesUsername.Clear();
            }


                    else
                {

                    MessageBox.Show("Username doest not exist!", "ALERT", MessageBoxButtons.OK, MessageBoxIcon.Error);
                }
                
                }

            else 
            {
                        // TO CHECK IF USERNAME EXISTS FOR CHECKING
                SqlDataAdapter sdaCheck = new SqlDataAdapter(@"SELECT * FROM [dbo].[BioData] where Username ='" + txtActivitiesUsername.Text.ToUpper() + "';", con);
                DataTable dtCheck = new DataTable();
                sdaCheck.Fill(dtCheck);

                if (dtCheck.Rows.Count == 1)
                {

                    panelActivities.Visible = false;
                    panelDepositMoney.Visible = false;
                    labelBalanceEnquiry.Text = txtActivitiesUsername.Text;
                    panelBalanceEnquiry.Visible = true;
                   panelBalanceEnquiry.Location = new Point(20, 29);
                    panelHome.Visible = false;
                    PanelCreateAccount.Visible = false;
                    panelWithdrawMoney.Visible = false;
                    txtActivitiesUsername.Clear();
                }

                    else
                {

                    MessageBox.Show("Username doest not exist!", "ALERT", MessageBoxButtons.OK, MessageBoxIcon.Error);
                }
                
            }

             
            }
            
        }

    }


</body>
</html>
