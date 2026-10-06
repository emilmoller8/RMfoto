var currentPage = 1;
 
function nextPage()
{
  // Næste side
	var nextPage = $("#page" + (currentPage + 1));
 
	// Tjek om næste side eksisterer
	if (nextPage.length != 0)
	{
		// Skjul nuværende side
		$("#page" + currentPage).hide();
 
		// Vis næste side
		nextPage.show();
 
		// Husk at gemme nuværende sidetal
		currentPage++;
	}
}
 
function previousPage()
{
	// Hvis vi ikke allerede er på første side
	if (currentPage > 1)
	{
		// Skjul nuværende side
		$("#page" + currentPage).hide();
 
		// Vis tidligere side
		$("#page" + (currentPage - 1)).show();
 
		// Husk at gemme nuværende sidetal
		currentPage--;
	}
}
 
function goToPage(pageIndex)
{
    // Ny side
	var newPage = $("#page" + pageIndex);
 
	// Tjek om ny side eksisterer
	if (newPage.length != 0)
	{
		// Skjul nuværende side
		$("#page" + currentPage).hide();
 
		// Vis ny side
		newPage.show();
 
		// Husk at gemme nyt sidetal
		currentPage = pageIndex;
	}
}